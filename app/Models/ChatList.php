<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatList extends Model
{
    use HasFactory;
    protected $table = 'chat_list';
    protected $fillable = [
        'chat_type_id',
    ];

    public function createChat(){

        $chatlist = new ChatList;

        $chatlist->chat_type_id = 1;
        $chatlist->save();

        return $chatlist->id;

    }

    public function createUserToUser($chosen_id)
    {
        $user = \Auth()->user();

        $chat_list_id = $this->createChat();
        $user_to_user = new UserToUserChat;

        $user_to_user->chat_list_id = $chat_list_id;
        $user_to_user->user_fr_id = $user->id;
        $user_to_user->user_sc_id = $chosen_id;
        $user_to_user->save();

        return $chat_list_id;
    }



}
