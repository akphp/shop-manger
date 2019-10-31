<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        'city_name',
         'country_id',
          'is_active',
          'store_id' ,
           'user_id' 
    ];
}
