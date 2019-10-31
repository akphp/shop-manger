<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SmsSetting extends Model
{
    protected $fillable = [
        'api', 
        'username', 
        'password',
        'sender_name' ,
         'user_id' ,
          'store_id'
    ];
}
