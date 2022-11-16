<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersChatList extends Model
{
    use HasFactory;

    protected $table = 'users_chat_list';
    protected $fillable = [
        'user_id',
        'chat_list_id',
        'firend_id',
        'group_id',
    ];

    public function getChatListId($friend_id){
        $user_id = \Auth()->user()->id;

        return UsersChatList::where([
            ['user_id', '=', $user_id],
            ['friend_id', '=', $friend_id],
        ])->value('chat_list_id');

    }
}
