<?php

namespace App\Http\Controllers;

use App\Models\ChatList;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class MessengerController extends Controller
{

  public function index(){
      $users = User::get();
//      dd($users);
      return view('messenger.messenger', compact('users'));
  }


  public function store(Request $request, ChatList $chatList, Message $message){

      try {
        $chat_list_id = $chatList->createChat();

//        dd($request->msg_text);
        $message = $message->saveMsg($request->msg_text, $chat_list_id);

      }catch(\Exception $e){
          return $e->getMessage();
      }


      return view('messenger.messenger');
  }

}
