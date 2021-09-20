<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\ DB;
use Illuminate\Support\Facades\Hash;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//$array=['create- gallery','edit- gallery','delete- gallery','list- gallery'];
        	DB::table('permission')->insert([
        	//'name'=>$array[rand(0,3)], 
        		'name'=>'create- gallery',
        	'created_at'=>date('Y-m-d H:i:s'),
        	'updated_at'=>date('Y-m-d H:i:s'),     	
        ]);
    }
}
