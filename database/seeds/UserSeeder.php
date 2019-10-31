<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
             DB::table('users')->insert([

	           'username'=> 'user',
	           'email'=> 'user@gmail.com',
	           'password'=> bcrypt('password'),
	           // 'store_id'=> 1 ,
	           // 'user_type' =>2 ,
	           'address' => 'suda',
	           'phone'=> '97044444444',
	           'mobile' => '00000000',
	           'remember_token' => Str::random(10),
	           'user_id' => 1,
	           'is_active' => 1,
	           'country_id'=> 1 ,
	           'city_id'=> 1 ,

        ]);
    }
}
