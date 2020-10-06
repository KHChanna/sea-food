<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    //
    protected $table = 'purchases';
    protected $fillable = [
        'supplier_id',
        'code',
        'invoice_number',
        'date',
        'paid_amount',
        'order_amount',
        'total',
        'payment_status',
        'status'
    ];

    public function supplier()
    {
        return $this->belongsTo('App\Models\Supplier', 'supplier_id');
    }
}
