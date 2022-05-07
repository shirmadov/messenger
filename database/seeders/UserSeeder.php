<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = array("Lionel Messi",'Neymar','Cristiano Ronaldo','David Beckham','Sergio Romas','Karim Benzema','Rafael Nadal','Roger Federer',
            'Sapa Shirmadov','Elon Musk','Bill Gates','Jeff Bezos','Larry Page');

        foreach ($names as $name){
            \DB::table('users')->insert([
                'name'=> $name,

        ]);
        }

    }
}
