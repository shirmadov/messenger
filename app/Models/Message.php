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
    ];

    public function saveMsg($text, $chat_list_id){
        $user = \Auth()->user();
        $message = new Message;

        $users_unread = array(
            1=>false,
        );

        $message->chat_list_id  = $chat_list_id;
        $message->text          = $text;
        $message->read          = json_encode($users_unread);
        $message->author_id     = $user->id;

        $message->save();

//        dd($message);

        return $message;

    }

    public function getMsg($chat_list_id){
        $msg = $this->where('chat_list_id',$chat_list_id)->get();

        return $msg;
    }


}
