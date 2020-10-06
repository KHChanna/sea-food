<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductUnit;
use App\Models\Purchase;
use App\Models\PurchaseDetail;
use App\Models\Unit;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchases = Purchase::whereNull('deleted_at')->with('supplier')->get();
        return view('administrator.purchase.index', compact('purchases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $invoice_number = 'P01A0'.time();
        $products = Product::with('category', 'image', 'unit')->get();

        return view('administrator.purchase.create', compact('invoice_number', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return dd($request->all());
        $total_as_dollar = $request->total_as_dollar;
        $paid_as_us = $request->paid_as_dollar;

        $purchase = Purchase::create( [
            'supplier_id'       =>  $request->supplier,
            'code'              =>  $request->code,
            'invoice_number'    => $request->invoice,
            'date'              =>  Carbon::parse($request->next_payment),
            'paid_amount'       =>  $request->paid_as_dollar ?? 0,
            'order_amount'      => 0,
            'total'             => $request->total_as_dollar,
            'payment_type'      => $request->payment_type,
            'payment_status'    => ($total_as_dollar - $paid_as_us) <= 0 ? 1 : 0 ,
            'status'            => 1,
        ] );

        $saleProduct = session()->get('purcasheProduct');
        if ($saleProduct)
        {
            foreach( $saleProduct as $key => $value )
            {
                // return $value;
                PurchaseDetail::create([
                    'product_id'    =>  $value['id'],
                    'unit_id'       =>  $value['unit'],
                    'purchase_id'   =>  $purchase->id,
                    'qty'           =>  $value['qty'],
                    'price'         =>  $value['cost'],
                ]);
            }
            
        }
        session()->forget('purcasheProduct');
        return redirect()->route('purchase.index')->with('success', 'Save Successfully');
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
        $purchase = Purchase::whereNull('deleted_at')->where('id', $id)->with('supplier')->first();
        $purchase_details = PurchaseDetail::where('purchase_id', $id)->with('product', 'unit')->get();
        $total = $purchase->total;

        return view('administrator.purchase.show', compact('purchase', 'purchase_details', 'total'));
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
        Purchase::find($id)->delete();
        PurchaseDetail::where('purchase_id', $id)->delete();

        return response()->json(200);
    }

    public function getCart()
    {
        $saleProduct = session()->get('purcasheProduct');
        return response()->json($saleProduct);
    }

    public function addCard($id)
    {
        // session()->forget('saleProduct');
        $product = Product::find($id);
        $product_unit = ProductUnit::where('product_id', $id)->where('qty_per_unit', 1)->first();
        $purcasheProduct = session()->get('purcasheProduct');
        // 
        if($purcasheProduct){
            if(@$purcasheProduct[$id]){
                return response()->json(['message' => 'warning', 'data' => 'Product adding is already exist!']);
            }else{
                $purcasheProduct[$id] = [
                    "id" => $product->id,
                    "name" => $product->name,
                    "qty" => 1,
                    "unit" => $product_unit->unit_id,
                    "unit_name" => Unit::where('id', $product_unit->unit_id)->pluck('name', 'id'),
                    "cost" => $product_unit->price,
                    "discount" => $product->product_discount,
                    "total" => $product_unit->price,
                    "qty_per_unit" => 1,
                    "total_dis" => 0

                ];
                session()->put('purcasheProduct', $purcasheProduct);
                return response()->json(['message' => 'success', 'data' => 'Product adding successfully.']);
            }
        }else{
            $purcasheProduct[$id] = [
                "id" => $product->id,
                "name" => $product->name,
                "qty" => 1,
                "unit" => $product_unit->unit_id,
                "unit_name" => Unit::where('id', $product_unit->unit_id)->pluck('name', 'id'),
                "cost" => $product_unit->price,
                "discount" => $product->product_discount,
                "total" => $product_unit->price,
                "qty_per_unit" => 1,
                "total_dis" => 0
            ];
            session()->put('purcasheProduct', $purcasheProduct);
            return response()->json(['message' => 'success', 'data' => 'Product added successfully.']);
        };
    }

    public function removeCart($id)
    {
        session()->forget('purcasheProduct.' . $id);
        return response()->json(['message' => 'success', 'data' => 'Product removed successfully.']);
    }

    public function removeCartAll()
    {
        session()->forget('purcasheProduct');
        return response()->json(['message' => 'success', 'data' => 'Product removed successfully.']);
    }

    public function updateProduct(Request $request, $id)
    {
        $product = Product::find($id);
        $product_unit = ProductUnit::where('product_id', $id)->where('unit_id', $request->unit)->first();
        $purcasheProduct = session()->get('purcasheProduct');
        $purcasheProduct[$id] = [
            "id" => $request->id,
            "name" => $product->name,
            "qty" => $request->qty,
            "unit" => $product_unit->unit_id,
            "unit_name" => Unit::find($product_unit->unit_id)->pluck('name', 'id'),
            "cost" => $product_unit->price,
            "total" => $request->total,
            // "qty_per_unit" => $request->qty_unit,
            // "purchase_total_dis" => $request->purchase_total_dis
        ];
        session()->put('purcasheProduct', $purcasheProduct);
        return response()->json(['message' => 'success', 'data' => 'Product Updated successfully.']);
    }
}
