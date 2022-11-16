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

        $data = [
            ['user_id'=>$user->id,'chat_list_id'=>$chat_list_id,'friend_id'=>$chosen_id],
            ['user_id'=>$chosen_id,'chat_list_id'=>$chat_list_id,'friend_id'=>$user->id],

        ];

        \DB::table('users_chat_list')->insert($data);

        return $chat_list_id;
    }



}
