<?php

namespace App\Modesl;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    //
    protected $table = 'currencies';
    protected $fillable = ['dollar', 'riel'];   
}
