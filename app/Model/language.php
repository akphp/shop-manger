<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class language extends Model
{
      protected $fillable = [
        'language_name',
         'is_active',
          'user_id'
    ];
}
