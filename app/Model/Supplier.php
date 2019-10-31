<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = [
        'full_name', 
        'email', 
        'password',
        'country_id' ,
         'nationality_id' ,
          'city_id' ,
          'store_id' ,
          'address' , 
          'is_active' , 
          'user_id'
    ];
}
