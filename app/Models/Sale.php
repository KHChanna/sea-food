<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    //
    protected $table = 'sells';
    protected $fillable = [
        'code',
        'invoice_number',
        'sale_date',
        'paid_amount',
        'order_amount',
        'total',
        'payment_status',
        'payment_type',
        'status',
    ];

    public function saleDetail()
    {
        return $this->hasMany(SaleDetail::class, 'sell_id', 'id');
    }
}
