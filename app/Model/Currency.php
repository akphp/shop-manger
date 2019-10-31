<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
      protected $fillable = [
        'name',
         'currency_icon',
          'user_id',
          'is_active'
    ];
}
