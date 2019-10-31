<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TrailAccount extends Model
{
    protected $fillable = [
        'store_id', 
        'plan_id',
         'no_renew',
         'paid_at'
    ];
}
