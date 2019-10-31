<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    protected $fillable = [
        'username',
         'email',
          'password',
          'country_id' ,
           'city_id' ,
            'nationality_id' ,
             'address' , 
             'identity_no' , 
             'phone' ,
              'mobile' ,
              'is_active' ,
              'user_id'
    ];
}
