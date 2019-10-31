<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Accoun extends Model
{
    protected $fillable = [
        'store_id',
         'last_payment',
          'plan_id',
          'store_id' ,
          'status' ,
          'expired_date',
          'last_renew_date' , 
          'sub_domain' ,
           'business_name'
    ];
}
