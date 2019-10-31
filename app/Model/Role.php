<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name',
         'description',
          'user_id',
          'store_id' , 
          'flag'
    ];
}
