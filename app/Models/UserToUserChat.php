<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserToUserChat extends Model
{
    use HasFactory;

    protected $table = 'user_to_user_chat';
    protected $fillable = [
        'chat_list_id',
        'user_fr_id',
        'user_sc_id',
    ];

    public function getChatListId($friend_id){
        $user_id = \Auth()->user()->id;

        return UserToUserChat::where([
            ['user_fr_id','=',intval($friend_id)],
            ['user_sc_id','=',$user_id],
        ])->orWhere([
            ['user_fr_id','=',$user_id],
            ['user_sc_id','=',intval($friend_id)],
        ])->value('chat_list_id');

    }
}
