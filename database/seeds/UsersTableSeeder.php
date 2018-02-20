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
        App\User::Create([
           'name'=>'Ashiq',
           'email'=>'ashiq@gmail.com',
            'password'=>bcrypt('123456')
        ]);
    }
}
