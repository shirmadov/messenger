<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function searchUser(Request $request, User $user){
        try {
            $users = $user->userWanted($request->value);

//            dd($users);
            $html = view('messenger.module.pages.users_module.users_list_module',compact('users'))->render();
//            dd($html);

            return response()->json([
                'success'=>true,
                'content'=>$html
            ]);
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function test(){

//        dd(file_exists(public_path('img/profile/avatar.png')));
//        $im = imagecreatefrompng(public_path('img/profile/avatar.png'));
        $im = imagecreatetruecolor(400, 300);
        $bgc = imagecolorallocate($im, 100, 200, 20);
        imagefilledellipse($im,200, 150, 300, 200, $bgc);
        header('Content-Type: image/png');

        imagepng($im,public_path('img/profile/avatar5.png'));
        imagedestroy($im);

//        echo '<img src="'.base64_encode($im).'" alt="">';

//        return $im;

    }
}
