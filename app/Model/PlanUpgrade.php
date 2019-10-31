<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PlanUpgrade extends Model
{
    protected $fillable = [
        'plan_id',
         'store_id', 
         'user_id',
         'store_id' ,
          'offer_id'
    ];
}
