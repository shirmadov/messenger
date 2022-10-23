<?php

namespace App\Http\Controllers;

use App\Models\ChatList;
use App\Models\Message;
use App\Models\User;
use App\Models\UserToUserChat;
use Illuminate\Http\Request;

class MessengerController extends Controller
{

  public function index(Message $message, User $user){

      $users = User::get();

//      dd($users);

      return view('messenger.messenger', compact('users'));
  }


  public function store(Request $request, ChatList $chatList, Message $message, UserToUserChat $userToUserChat, User $user){

      try {

          $hash_tokens = array();

        if($request->chat_type === 'user_to_user'){
            $chat_list_id = $userToUserChat->checkUserToUser($request->chosen_id);

            if(is_null($chat_list_id)){
                $chat_list_id = $chatList->createUserToUser($request->chosen_id);
            }

            $message = $message->saveMsg($request->msg_text, $chat_list_id,$request->chosen_id);

            $hash_tokens[] = $user->getHashToken($request->chosen_id);

        }else if($request->chat_type === 'group'){

        }


//        $html = view('messenger.module.messages', compact())->render();
          return response()->json([
              'success'=>true,
              'hash_tokens'=>$hash_tokens,
              'content'=>$message
          ]);


      }catch(\Exception $e){
          return $e->getMessage();
      }

  }

  public function choose(Request $request, UserToUserChat $userToUserChat, Message $message){

      try {

//          dd($request->all());
          $chat_list_id = $userToUserChat->checkUserToUser($request->user_id);
          $messages =  $message->getMsg($chat_list_id);


          $html = view('messenger.module.messages', compact('messages'))->render();


          return response()->json(['success'=>true,'content'=>$html]);


      }catch(\Exception $e){
        return $e->getMessage();
      }



  }

}
