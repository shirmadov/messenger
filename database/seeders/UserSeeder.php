<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $names = array("Lionel Messi",'Neymar','Cristiano Ronaldo','David Beckham','Sergio Romas','Karim Benzema','Rafael Nadal','Roger Federer',
//            'Sapa Shirmadov','Elon Musk','Bill Gates','Jeff Bezos','Larry Page');
//
//        foreach ($names as $name){
//            \DB::table('users')->insert([
//                'name'=> $name,
//
//        ]);
//        }

//        $user = User::factory(10)->create();

        $users = User::get();

//        dd($users);
        $colors = array('#4BC87E','#4BC87E','#58C84B','#BFC84B','#C89E4B','#C8514B','#4BAAC8','#4B6DC8','#814BC8','#BD4BC8','#C84B72','#C84B4B');

        foreach ($users as $user){
            Profile::create([
                'user_id'=>$user->id,
                'avatar_color'=>$colors[rand(0,11)]
            ]);
        }

    }
}
