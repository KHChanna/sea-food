<?php

namespace App\Http\Resources;

use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

    public function toArray($request)
    {
        return [
            'id'        =>      $this->id,
            'code'      =>      $this->code,
            'name'      =>      $this->name,
            'category'  =>      Category::find($this->category_id)->first() ? Category::find($this->category_id)->first()->name : '',
            'units'      =>     getUnitAPI($this->id),
            'image'     =>      ProductImage::where('product_id', $this->id)->first() ? asset('/uploads/images/products/'. ProductImage::where('product_id', $this->id)->first()->image) : '',
        ];
    }
}
