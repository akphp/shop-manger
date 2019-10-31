<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class VerificationCode extends Model
{
    protected $fillable = [
        'type',
         'code',
          'user_id',
          'user_type' ,
           'expire_date'
    ];
}
