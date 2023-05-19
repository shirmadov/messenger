<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Message extends Model
{
    use HasFactory;
    protected $table = 'messages';
    protected $fillable = [
        'chat_type_id',
        'text',
        'read',
        'reply_msg_id',
    ];

    public function saveMsg($text, $chat_list_id, $chosen_user_id, $reply_msg_id, $msg_files = null){
        $user = \Auth()->user();
        $message = new Message;

        $users_unread = array(
            'id'.$chosen_user_id=>false,
        );


        $message->chat_list_id  = $chat_list_id;
        $message->text          = $text;
        $message->read          = json_encode($users_unread);
        $message->author_id     = $user->id;
        $message->reply_msg_id  = $reply_msg_id;

        $message->save();

        if(!is_null($msg_files)){

            foreach ($msg_files as $msg_file){

                $filePath = '/files/chat/'.$chat_list_id;
                $newName = uniqid() . '.'.$msg_file->getClientOriginalExtension();
                $msg_file->storeAs($filePath, $newName, 'public');

                $message_file = new MessageFile;

                $message_file -> message_id = $message->id;
                $message_file -> document_name = $msg_file->getClientOriginalName();
                $message_file -> document_path = $newName;
                $path_info = pathinfo($message_file->document_path);


                if (isset($path_info['extension']) && isset(config('app.type_files')[strtolower($path_info['extension'])]))
                    $document_type = config('app.type_files')[strtolower($path_info['extension'])];
                else
                    $document_type = 'undefined';

                $message_file->document_type = $document_type;
                $message_file->save();
            }
        }
//        dd("Came");

        return $message->id;
    }

    public function getMsg($chat_list_id){
        $msg = \DB::table('messages')->where('chat_list_id',$chat_list_id)
            ->join('users','messages.author_id','=','users.id')
            ->select('messages.*','users.name as author_name')
            ->orderBy('messages.id','asc')
            ->get();


        $msg->each(function( $item, $key){
            $item->msg_files = \DB::table('message_files')->where('message_id',$item->id)->get();
           if(!is_null($item->reply_msg_id)){
//               dd($item->reply_msg_id);
                $item->reply_msg = $this->where('messages.id',$item->reply_msg_id)
                    ->join('users','messages.author_id','=','users.id')
                    ->select('messages.*','users.name as author_name')
                    ->first();

           }
        });

//        dd($msg);


        return $msg;
    }

    public function getLastMsg($msg_id){

        $msg = \DB::table('messages')->where('messages.id',$msg_id)
            ->join('users','messages.author_id','=','users.id')
            ->select('messages.*','users.name as author_name')
            ->first();

        $msg->msg_files = \DB::table('message_files')->where('message_id',$msg->id)->get();

        if(!is_null($msg->reply_msg_id)){
            $msg->reply_msg = $this->where('messages.id',$msg->reply_msg_id)
                ->join('users','messages.author_id','=','users.id')
                ->select('messages.*','users.name as author_name')
                ->first();
        }


        return $msg;
    }

    public function removeMsg($msg_id){
        \DB::table('messages')->where('id',$msg_id)->delete();
    }

    public function getChatListIdByMsg($msg_id){
        return \DB::table('messages')->where('id',$msg_id)->value('chat_list_id');
    }


}
