<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function saveProfileSt(Request $request, User $user){
        try {
            $profile = $user->saveProfile($request->all());

            return response()->json(['success'=>true]);
        }catch(\Exception $e){
            return $e->getMessage();
        }
//        dd('Came',$request->all());
    }

    public function chooseSt(Request $request){

        try {
            dd($request->all());
            $html = view('messenger.module.pages.settings_module.'.$request->path)->render();

            return response()->json([
                'success'=>true,
                'content'=>$html
            ]);
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }
}
