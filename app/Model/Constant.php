<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Constant extends Model
{
      protected $fillable = [
        'parent_id',
         'name', 
         'user_id',
         'is_active'
    ];
}
