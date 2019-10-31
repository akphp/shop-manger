<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
       protected $fillable = [
        'username',
         'email',
          'password',
          'is_active' ,
          'user_type' ,
           'user_id'
    ];
}
