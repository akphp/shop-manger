<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class SellerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('sellers')->insert([

	          'username'=> 'selle',
              'email'=> 'selle@gmail.com',
              'password' => bcrypt('password'),
              'country_id' => 0 ,
              'city_id' => 1,
              'nationality_id'=> 1 ,
              'address'=> 'soud' , 
              'identity_no'=> '40415455' , 
              'phone' => '+440000000',
               'mobile' =>'04444444444"',
               'remember_token' => Str::random(10),
              'is_active'=> 1 ,
              'user_id'=> 1
        ]);



               DB::table('sellers')->insert([

	          'username'=> 'selle1',
              'email'=> 'selle1@gmail.com',
              'password' => bcrypt('password'),
              'country_id' => 1 ,
              'city_id' => 2,
              'nationality_id'=> 1 ,
              'address'=> 'usa' , 
              'identity_no'=> '6544454554' , 
              'phone' => '+440000000',
               'mobile' =>'05445545454"',
               'remember_token' => Str::random(10),
              'is_active'=> 0 ,
              'user_id'=> 1
        ]);
    }
}
