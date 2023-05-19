<?php

namespace App\Http\Controllers;

use App\Models\ChatList;
use App\Models\Message;
use App\Models\User;
use App\Models\UsersChatList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MessengerController extends Controller
{

  public function index(Message $message, User $user){

//      dd(Storage::exists('public'));

      $users = $user->getUsers();

//      dd($users);
      $user_profile = auth()->user()->profile;
//      dd(\Auth()->user()->profile->avatar);
      return view('messenger.messenger', compact('users'));
  }


  public function store(Request $request, ChatList $chatList, Message $message, UsersChatList $usersChatList, User $user){

      try {

//          dd($request->all());
          $hash_tokens = array();
          $msg_id = '';

        if($request->chat_type === 'user_to_user'){

            $chat_list_id = $usersChatList->getChatListId($request->chosen_id);

            if(is_null($chat_list_id)){
                $chat_list_id = $chatList->createUserToUser($request->chosen_id);
            }

            $msg_id = $message->saveMsg($request->msg_text, $chat_list_id,$request->chosen_id,$request->msg_reply_id, $request->msg_files);

            $hash_tokens[] = $user->getHashToken($request->chosen_id);

        }else if($request->chat_type === 'group'){

        }

          $message = $message->getLastMsg($msg_id);

          $html = view('messenger.module.message', compact('message'))->render();

          return response()->json([
              'success'=>true,
              'hash_tokens'=>$hash_tokens,
              'content'=>$html, //Bu yerde dine msg_id gerekli
              'msg_id'=>$msg_id //Bu yerde dine msg_id gerekli
          ]);


      }catch(\Exception $e){
          return $e->getMessage();
      }

  }

  public function choose(Request $request, UsersChatList $usersChatList, Message $message){

      try {
          $chat_list_id = $usersChatList->getChatListId($request->user_id);

          $messages =  $message->getMsg($chat_list_id);


          $html = view('messenger.module.messages', compact('messages'))->render();

          return response()->json(['success'=>true,'content'=>$html]);


      }catch(\Exception $e){
        return $e->getMessage();
      }



  }

  public function getMsg(Request $request,Message $message){

      try {
          $message = $message->getLastMsg($request->msg_id);

          $html = view('messenger.module.message', compact('message'))->render();

          return response()->json(['success'=>true,'content'=>$html]);

      }catch(\Exception $e){
          return $e->getMessage();
      }

  }

  public function deleteMsg(Request $request,Message $message){
      try {

            $chat_list_id = $message->getChatListIdByMsg($request->msg_id);
            $message->removeMsg($request->msg_id);
            $messages =  $message->getMsg($chat_list_id);

            $html = view('messenger.module.messages', compact('messages'))->render();

            return response()->json(['success'=>true,'content'=>$html]);
      }catch(\Exception $e){
          return $e->getMessage();
      }
  }

    public function downloadChatMsgFile( $id, $file )
    {
//        dd( $id, $file);
        return response()->download(base_path() . '/storage/app/public/files/chat/'.$id.'/'.$file);
    }

    public function test(){
        $url = Storage::url('file.jpg');


    }




}
