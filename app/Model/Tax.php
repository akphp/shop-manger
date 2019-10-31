<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{
    protected $fillable = [
        'tax_name', 
        'tax_val', 
        'user_id',
        'flag_active' ,
         'store_id' , 
         'country_id'
    ];
}
