<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductUnit;
use App\Models\Register;
use App\Models\RegisterDetail;
use App\Models\Sale;
use App\Models\SaleDetail;
use App\Models\Unit;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales  =   Sale::where('status', 1)->get();
        $regiseration = Register::whereDate('created_at', Carbon::today())->get();

        return view('administrator.sale.index', compact('sales', 'regiseration'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $invoice_number = 'S00F'.time();
        $products = Product::with('category', 'image', 'unit')->get();

        return view('administrator.sale.create', compact('products', 'invoice_number'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // return dd($request->all());
        $total_as_dollar = $request->total_as_dollar;
        $paid_as_us = $request->paid_as_dollar;
        $regiseration = Register::whereDate('created_at', Carbon::today())->first();

        if(!isset($regiseration))
            return redirect()->route('sale.index')->withErrors(['error' => 'Your Have not yet open balance.']);

        $sale = Sale::create( [
            'code'              =>  0,
            'invoice_number'    => $request->invoice,
            'sale_date'         =>  Carbon::parse($request->next_payment),
            'paid_amount'       =>  $request->paid_as_dollar ?? 0,
            'order_amount'      => 0,
            'total'             => $request->total_as_dollar,
            'payment_type'      => $request->payment_type,
            'payment_status'    => ($total_as_dollar - $paid_as_us) <= 0 ? 1 : 0 ,
            'status'            => 1,
        ] );

        RegisterDetail::create( [
            'sell_id'       =>      $sale->id,
            'register_id'   =>      $regiseration->id,
            'total_amount'  =>      $regiseration->open_balance,
        ] );
        
        $saleProduct = session()->get('saleProduct');
        if ($saleProduct)
        {
            foreach( $saleProduct as $key => $value )
            {
                // return $value;
                SaleDetail::create([
                    'product_id'    =>  $value['id'],
                    'unit_id'       =>  $value['unit'],
                    'sell_id'       =>  $sale->id,
                    'qty'           =>  $value['qty'],
                    'price'         =>  $value['cost'],
                    'total'         =>  $value['total'],
                ]);
            }
            
        }
        session()->forget('saleProduct');
        return redirect()->route('sale.index')->with('success', 'Save Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sale = Sale::find($id);
        $sale_detail = SaleDetail::where('sell_id', $id)->with('unit')->get();
        $total = SaleDetail::where('sell_id', $id)->sum('total');
        return view('administrator.sale.show', compact('sale', 'sale_detail', 'total'));
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
        Sale::find($id)->delete();
        SaleDetail::where('sell_id', $id)->delete();

        return response()->json('success');
    }

    public function getCart()
    {
        $saleProduct = session()->get('saleProduct');
        return response()->json($saleProduct);
    }

    public function addCard($id)
    {
        // session()->forget('saleProduct');
        $product = Product::find($id);
        $product_unit = ProductUnit::where('product_id', $id)->where('qty_per_unit', 1)->first();
        $saleProduct = session()->get('saleProduct');
        // 
        if($saleProduct){
            if(@$saleProduct[$id]){
                return response()->json(['message' => 'warning', 'data' => 'Product adding is already exist!']);
            }else{
                $saleProduct[$id] = [
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
                session()->put('saleProduct', $saleProduct);
                return response()->json(['message' => 'success', 'data' => 'Product adding successfully.']);
            }
        }else{
            $saleProduct[$id] = [
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
            session()->put('saleProduct', $saleProduct);
            return response()->json(['message' => 'success', 'data' => 'Product added successfully.']);
        };
    }

    public function removeCart($id)
    {
        session()->forget('saleProduct.' . $id);
        return response()->json(['message' => 'success', 'data' => 'Product removed successfully.']);
    }

    public function removeCartAll()
    {
        session()->forget('saleProduct');
        return response()->json(['message' => 'success', 'data' => 'Product removed successfully.']);
    }

    public function updateProduct(Request $request, $id)
    {
        $product = Product::find($id);
        $product_unit = ProductUnit::where('product_id', $id)->where('unit_id', $request->unit)->first();
        $saleProduct = session()->get('saleProduct');
        $saleProduct[$id] = [
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
        session()->put('saleProduct', $saleProduct);
        return response()->json(['message' => 'success', 'data' => 'Product Updated successfully.']);
    }
}
