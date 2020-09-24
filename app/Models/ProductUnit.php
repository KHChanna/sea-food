<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductUnit extends Model
{
    //
    protected $table = 'product_units';
    protected $fillable = ['product_id', 'unit_id', 'qty_per_unit', 'unit_type', 'price'];
}
