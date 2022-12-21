<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function saveProfileSt(Request $request, User $user){
        try {

            $profile = $user->saveProfileImg($request->profile_img);

            return response()->json(['success'=>true]);
        }catch(\Exception $e){
            return $e->getMessage();
        }
        dd('Came',$request->all());
    }
}
