<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use App\Models\ProductUnit;
use App\Models\Unit;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('category')->get();
        return view('administrator.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrator.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $product = Product::create( [
            'name'              =>      $request->name,
            'category_id'       =>      $request->category_id,
            'code'              =>      $request->code,
            'description'       =>      $request->description,
        ] );

        if ( isset($request->unit_id) )
        {
            foreach ( $request->unit_id as $key => $value )
            {
                ProductUnit::create( [
                    'product_id'        =>      $product->id,
                    'unit_id'           =>      $value,
                    'qty_per_unit'      =>      $request->qty[$key],
                    'unit_type'         =>      $value > 1 ? 'child' : 'parent',
                    'price'             =>      $request->price[$key]
                ] );
            }
        }

        if( isset($request->images) ) 
        {
            foreach ($request->images as $image) {
                if ( isset($image) )
                {
                    $filename = uniqid().time().'.'.$image->getClientOriginalExtension();
                    $path = public_path('/uploads/images/products');
                    $image->move($path, $filename);
    
                    ProductImage::create( [
                        'product_id'    =>      $product->id,
                        'image'         =>      $filename,
                    ] );
                }
            }
        }

        return redirect()->route('product.index')->with('success', 'Product saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Product::find($id);
        $unit = Unit::all();
        // dd($data);
        return view('administrator.product.show', compact('data', 'unit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $product_units = ProductUnit::where('product_id', $product->id)->get();
        $images = ProductImage::where('product_id', $product->id)->pluck('image', 'id');

        return view('administrator.product.edit', compact('product', 'product_units', 'images'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        Product::find($id)->update( [
            'name'              =>      $request->name,
            'category_id'       =>      $request->category_id,
            'code'              =>      $request->code,
            'description'       =>      $request->description,
        ] );

        if ( isset($request->unit_id) )
        {
            foreach ( $request->unit_id as $key => $value )
            {
                ProductUnit::where('product_id', $id)->update( [
                    'product_id'        =>      $id,
                    'unit_id'           =>      $value,
                    'qty_per_unit'      =>      $request->qty[$key],
                    'unit_type'         =>      $value > 1 ? 'child' : 'parent',
                    'price'             =>      $request->price[$key]
                ] );
            }
        }

        if ( isset($request->old) )
        {
            foreach ($request->old as $image)
            {
                ProductImage::find($image)->delete();
            }
        //    ProductImage::find($request->od)
        }

        if( isset($request->images) ) 
        {
            foreach ($request->images as $image) {
                if ( isset($image) )
                {
                    $filename = uniqid().time().'.'.$image->getClientOriginalExtension();
                    $path = public_path('/uploads/images/products');
                    $image->move($path, $filename);
    
                    ProductImage::create( [
                        'product_id'    =>      $id,
                        'image'         =>      $filename,
                    ] );
                }
            }
        }

        return redirect()->route('product.index')->with('success', 'Product saved!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Product::find($id)->delete();
    }
}
