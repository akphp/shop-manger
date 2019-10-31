<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Timezone extends Model
{
    protected $fillable = [
        'timezone_format',
         'date_format', 
         'user_id',
         'flag_active'
    ];
}
