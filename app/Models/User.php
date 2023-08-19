<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'hash_login_token'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getHashToken($user_id){
        return $this->where('id', $user_id)->value('hash_login_token');
    }

    public function getUsers(){

        $user_id = \Auth()->user()->id;

        $user_chats = UsersChatList::where('users_chat_list.user_id','=',$user_id)
            ->join('users','users_chat_list.friend_id','=','users.id')
            ->join('profiles','users.id','=','profiles.user_id')
            ->leftJoin('groups','users_chat_list.group_id','=','groups.id')
//            ->join('messages','users_chat_list.chat_list_id','=','messages.chat_list_id')
            ->select('users_chat_list.*','users.name','users.id as user_id','profiles.avatar_color as avatar_color','profiles.avatar as avatar_path')
            ->get();

        $user_chats->each(function( $item, $key ) use($user_id){
            $item->notif_count = \DB::table('messages')->where([
                ['chat_list_id','=',$item->chat_list_id],
                ['read->id'.$user_id,'=',false]
            ])->count();

            $item->last_msg = \DB::table('messages')->where('chat_list_id','=',$item->chat_list_id)->orderBy('created_at','desc')->first();
        });


        return $user_chats->sortBy('last_msg->created_at');

    }

    public function saveProfile($request)
    {
        $user = \Auth()->user();
        if (isset($request['profile_img'])) {
            $filename = uniqid() . '.' . $request['profile_img']->getClientOriginalExtension();
            $filePath = 'public/img/profile';
            $request['profile_img']->storeAs($filePath, $filename, 'private');
            Profile::where('user_id',$user->id)
            ->update(['avatar'=>$filename]);
        }
        $user_info = User::find($user->id);
        $user_info->name = $request['fullname'];
        $user_info->username = $request['username'];
        $user_info->save();
        return true;
    }

    public function profile(){
        return $this->hasOne(Profile::class);
    }

    public function userWanted($value){
        if(str_starts_with($value,'@') == false) $value = '@'.$value;
        $users = $this->where('username','like',strtolower($value).'%')
            ->join('profiles','users.id','=','profiles.user_id')
            ->select('users.name','users.username','users.id as user_id','profiles.avatar_color as avatar_color','profiles.avatar as avatar_path')
            ->get();
        return $users;
    }

}
