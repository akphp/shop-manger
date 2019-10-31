<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
      protected $fillable = [
        'country_name',
         'country_currency_id',
          'country_postal_code',
          'mobile_prefix' ,
           'language_id' ,
            'user_id' ,
             'nationality'
    ];
}
