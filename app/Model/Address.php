<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
     protected $fillable = [
        'customer_id',
         'vendor_id',
          'city_id',
          'store_id' ,
          'state' ,
          'subrub',
          'address1',
          'address2',
        'postal_code' ,
         'address_map' ,
          'country_id'
    ];
}
