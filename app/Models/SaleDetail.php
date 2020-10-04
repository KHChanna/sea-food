<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SaleDetail extends Model
{
    //
    protected $table = 'sell_details';
    protected $fillable = [
        'product_id',
        'sell_id',
        'unit_id',
        'qty',
        'price',
        'total'
    ];

    public function unit()
    {
        return $this->belongsTo('App\Models\Unit', 'unit_id');
    }
}
