<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductUnit;
use Exception;
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

        try {
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

        return ProductResource::collection([$product])->response()->setStatusCode(200);

        } catch (Exception $e) {
            return response()->json(['status' => 400, 'message' => $e->getMessage()]);
        }
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
        $product = Product::where('id', $id)->first();
        return ProductResource::collection([$product]);
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:products,name,'.$id,
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

        try {
            Product::find($id)->update( [
                'name'              =>      $request->name,
                'category_id'       =>      $request->category_id,
                'description'       =>      $request->description ?? '',
            ] );
    
            ProductUnit::where('product_id', $id)->update( [
                'unit_id'           =>      $request->unit_id,
                'price'             =>      $request->price
            ] );
    
            if( isset($request->image) ) 
            {
                $filename = uniqid().time().'.'.$request->image->getClientOriginalExtension();
                $path = public_path('/uploads/images/products');
                $request->image->move($path, $filename);
    
                ProductImage::where('product_id', $id)->update( [
                    'image'         =>      $filename,
                ] );
            }
        $product = Product::where('id', $id)->get();
        return ProductResource::collection($product)->response()->setStatusCode(200);

        } catch (Exception $e) {
            return response()->json(['status' => 400, 'message' => $e->getMessage()]);
        }
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
