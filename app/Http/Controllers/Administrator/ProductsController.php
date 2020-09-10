<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
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
        $category = Category::all();
        return view('administrator.product.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product([
            'name' => $request->get('name'),
            'code' => $request->get('code'),
            'price' => $request->get('price'),
            'category_id' => $request->get('category_id'),
            'place_id' => 1,
            'unit_id' => $request->get('unit_id'),
            'description' => $request->get('description')
        ]);
        $product->save();
        return redirect('admin/products/')->with('success', 'Product saved!');
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
    public function edit($id)
    {
        $product = Product::find($id);
        $category = Category::all();
        $unit = Unit::all();
        return view('administrator.product.edit', compact('product', 'category', 'unit'));
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
        dd($id);
        $product = Product::find($id);

        $product->name = $request->get('name');
        $product->code = $request->get('code');
        $product->price = $request->get('price');
        $product->description = $request->get('description');
        $product->category_id = $request->get('category_id');
        $product->unit_id = $request->get('unit_id');
        $product->place_id = 1;

        $product->save();
        return redirect('admin/products/')->with('success', 'Product saved!');
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
    }
}
