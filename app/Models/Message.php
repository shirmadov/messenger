<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function saveMsg($text, $chat_list_id, $chosen_user_id, $reply_msg_id){
        $user = \Auth()->user();
        $message = new Message;

        $users_unread = array(
            $chosen_user_id=>false,
        );

//        dd($users_unread);

        $message->chat_list_id  = $chat_list_id;
        $message->text          = $text;
        $message->read          = json_encode($users_unread);
        $message->author_id     = $user->id;
        $message->reply_msg_id  = $reply_msg_id;

        $message->save();

//        dd($message);

        return $message;
    }

    public function getMsg($chat_list_id){
        $msg = \DB::table('messages')->where('chat_list_id',$chat_list_id)
            ->join('users','messages.author_id','=','users.id')
            ->select('messages.*','users.name as author_name')
            ->orderBy('messages.id','asc')
            ->get();



        $msg->each(function( $item, $key){
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
