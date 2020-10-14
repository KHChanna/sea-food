<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::paginate();
        return ProductResource::collection($products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:products,name',
            'category_id' => 'required|numeric',
            'unit_id' => 'required|numeric',
            'price' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            $data = [
                'status' => false,
                'messages' => $validator->errors()
            ];
            return response()->json($data);
        }


        $code = 'P001' . time();
        $product = Product::create( [
            'name'              =>      $request->name,
            'category_id'       =>      $request->category_id,
            'code'              =>      $code,
            'description'       =>      $request->description ?? '',
        ] );

        ProductUnit::create( [
            'product_id'        =>      $product->id,
            'unit_id'           =>      $request->unit_id,
            'qty_per_unit'      =>      1,
            'unit_type'         =>      'parent',
            'price'             =>      $request->price
        ] );

        if( isset($request->image) ) 
        {
            $filename = uniqid().time().'.'.$request->image->getClientOriginalExtension();
            $path = public_path('/uploads/images/products');
            $request->image->move($path, $filename);

            ProductImage::create( [
                'product_id'    =>      $product->id,
                'image'         =>      $filename,
            ] );
        }

        return response()->json(['status' => 201, 'messages' => 'Product Store Successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $product = Product::find($id)->get();
        return ProductResource::collection($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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

    public function getCountProduct()
    {
        $products = Product::get();
        return JsonResponse( count($products) );
    }
}
