<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PlanOffer extends Model
{
    protected $fillable = [
        'offer_title',
         'plan_id',
          'start_date',
          'end_date' ,
           'discount_percentage_per_year' ,
            'discount_percentage_per_month' ,
             'is_active' , 'user_id'
    ];
}
