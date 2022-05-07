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

}
