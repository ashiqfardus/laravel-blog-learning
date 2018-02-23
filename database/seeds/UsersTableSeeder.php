<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=App\User::Create([
           'name'=>'Ashiq',
           'email'=>'ashiq@gmail.com',
            'password'=>bcrypt('123456'),
            'admin'=>1
        ]);

        App\Profile::create([
           'user_id'=>$user->id,
            'about'=>'Loren Ipsum Text',
            'avatar'=>'uploads/avatars/1.jpg',
            'facebook'=>'https://www.facebook.com/',
            'youtube'=>'https://www.youtube.com/'
        ]);
    }
}
