<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SuperadminSetting extends Model
{
    protected $fillable = [
        'setting_type_id',
         'setting_value',
          'applicable_platform_panel',
          'flag_active' ,
           'user_id'
    ];
}
