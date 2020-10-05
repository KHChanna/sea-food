<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\PaymentType;
use Illuminate\Http\Request;

class PaymentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $paymentTypes = PaymentType::get(); 
        return view('administrator.payment_type.index', compact('paymentTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('administrator.payment_type.create');
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
        $validator = $request->validate([
            'name' => 'required|unique:payment_types',
            'description' => 'nullable|min:5',
        ]);
        
        PaymentType::create( [ 
            'name'          =>  $request->name,
            'description'   =>  $request->description,
        ]) ;

        return redirect()->route('payment-type.index');
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
        $paymentTypes = PaymentType::where('id', $id)->first(); 
        return view('administrator.payment_type.edit', compact('paymentTypes'));
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
        $validator = $request->validate([
            'name' => 'required|unique:payment_types',
            'description' => 'nullable|min:5',
        ]);
        
        PaymentType::find($id)->update( [ 
            'name'          =>  $request->name,
            'description'   =>  $request->description,
        ]) ;

        return redirect()->route('payment-type.index');
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
        PaymentType::find($id)->delete();
        return response()->json(200);
    }
}
