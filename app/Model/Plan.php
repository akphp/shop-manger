<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
      protected $fillable = [
        'plan_title',
         'price_month', 
         'price_year',
         'currency_id' ,
          'plan_level' ,
           'no_inventory' ,
          'no_pos' ,
           'no_emp' ,
            'no_item' ,
             'is_active' ,
              'description' ,
               'user_id' ,
                'is_trial' ,
                 'interval_trail'
    ];
}
