<?php

namespace App\Http\Controllers;

use App\Models\ChatList;
use App\Models\Message;
use App\Models\User;
use App\Models\UserToUserChat;
use Illuminate\Http\Request;

class MessengerController extends Controller
{

  public function index(Message $message){

      $users = User::get();

      return view('messenger.messenger', compact('users'));
  }


  public function store(Request $request, ChatList $chatList, Message $message, UserToUserChat $userToUserChat){

      try {

        if($request->chat_type === 'user_to_user'){
            $chat_list_id = $userToUserChat->checkUserToUser($request->chosen_id);

            if(is_null($chat_list_id)){
                $chat_list_id = $chatList->createUserToUser($request->chosen_id);
            }

            $message = $message->saveMsg($request->msg_text, $chat_list_id);

        }else if($request->chat_type === 'group'){

        }
        $test = "Text";
//        dd($test);

//        $html = view('messenger.module.messages', compact())->render();
          return response()->json(['success'=>true,'content'=>$message]);


      }catch(\Exception $e){
          return $e->getMessage();
      }

  }

  public function choose(Request $request, UserToUserChat $userToUserChat, Message $message){

      try {

          $user = \Auth()->user()->id;
          $chat_list_id = $userToUserChat->checkUserToUser($request->user_id);
          $messages =  $message->getMsg($chat_list_id);


          $html = view('messenger.module.messages', compact('messages'))->render();


          return response()->json(['success'=>true,'content'=>$html]);


      }catch(\Exception $e){
        return $e->getMessage();
      }



  }

}
