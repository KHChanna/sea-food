<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'id',
        'name',
        'code',
        'price',
        'category_id',
        'unit_id',
        'place_id',
        'description'
    ];

    public function category()
    {
        return $this->hasOne('App\Models\Category', 'id');
    }

    public function unit() {
        return $this->hasOne('App\Models\Unit', 'id');
    }    
}
