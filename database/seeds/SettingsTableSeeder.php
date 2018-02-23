<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Settings::create([
           'site_name'=>'Laravel is blog',
           'contact_number'=>'018888888888',
           'contact_email'=>'laravel@laravel.com',
           'address'=>'Dhaka, Bangladesh',
        ]);
    }
}
