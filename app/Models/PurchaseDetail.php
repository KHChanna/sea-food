<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseDetail extends Model
{
    //
    protected $table = 'purchase_details';
    protected $fillable = [
        'product_id',
        'purchase_id',
        'unit_id',
        'qty',
        'price',
    ];

    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id', 'id');
    }

    public function unit()
    {
        return $this->belongsTo('App\Models\Unit', 'unit_id', 'id');
    }
}

