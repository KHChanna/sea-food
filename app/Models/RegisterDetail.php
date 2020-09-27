<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegisterDetail extends Model
{
    //
    protected $table = 'register_details';
    protected $fillable = [
        'sell_id',
        'register_id',
        'total_amount',
    ];
}
