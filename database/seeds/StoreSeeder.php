<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('stores')->insert([
	      'store_name'=> 'kenzy store',
         'store_start_date' => '2019-10-26 09:34:23',
          'store_logo' => 'logo.png',
          'store_size' =>  1400,
           'store_inventory_no'=> 1400 , 
           'store_employee_no'=> 20 ,
           'store_notes' => ' no note .....',
            'store_business_record_no' => 100,
            'store_tax_no' => 800474, 
            'store_type_activity'  => 1,
            'store_product_type' =>  1, 
            'store_city_id'  => 1,
             'store_address' => "soud", 
             'store_address_map'  => '140150', 
             'store_mobil'  =>'10001111', 
             'store_fax'  =>'1010101010',
              'store_email'  => 'store@gmail.com', 
              'store_timezone' => 100200, 
              'store_languange'=> 1,
               'store_cuurency'=> 1,
                'date_create_account'=> '2019-10-26 09:34:23',
                 'store_active_flag'=> 1, 
                 'custom_url'=> 'www.kenay.om', 
                 'date_format' =>'Y/M/D',
                  'country_service'=>'service',
                  'store_owner' => 1
        ]);
    }
}
