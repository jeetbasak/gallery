<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\ DB;
use Illuminate\Support\Facades\Hash;

class AdminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        	DB::table('users')->insert([
        	'name'=>'Admin '.str_random(5),
        	'email'=> 'Admin'.str_random(5).'@email.com',
        	'password'=> Hash::make(12345678),
        	'user_type'=>'A',
        ]);
    }
}
