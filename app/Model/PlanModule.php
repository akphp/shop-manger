<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PlanModule extends Model
{
    protected $fillable = [
        'plan_id',
         'module_id', 
         'user_id',
         'is_active'
    ];
}
