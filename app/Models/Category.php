<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = 'categories';
    protected $fillable = [
        'id',
        'parent_id',
        'name',
        'code',
        'description'
    ];

    public function category()
    {
        return $this->hasMany('App\Models\Product', 'category_id', 'id');
    }
}
