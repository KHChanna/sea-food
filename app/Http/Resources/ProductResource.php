<?php

namespace App\Http\Resources;

use App\Models\Category;
use App\Models\ProductImage;
use App\Models\ProductUnit;
use App\Models\Unit;
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
        $product_unit = ProductUnit::where('product_id', $this->id)->first();
        $category = Category::find($this->id);
        return [
            'id'        =>      $this->id,
            'code'      =>      $this->code,
            'name'      =>      $this->name,
            'category'  =>      $category->name ?? 'None',
            'units'     =>      [
                                    'unit_name' => $product_unit->unit ? $product_unit->unit->name : 'None',
                                    'price'     => $product_unit->price ?? 0.00
            ],
            'image'     =>      ProductImage::where('product_id', $this->id)->first() ? asset('/uploads/images/products/'. ProductImage::where('product_id', $this->id)->first()->image) : '',
        ];
    }
}
