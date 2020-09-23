<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Http\Requests\SupplierStoreRequest;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Supplier::all();
        return view('administrator.supplier.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrator.supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SupplierStoreRequest $request)
    {
        //
        $validated = $request->validated();

        Supplier::create($request->all());

        return redirect()->route('supplier.index');
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
    public function edit(Supplier $supplier)
    {
        //
        return view('administrator.supplier.edit', compact('supplier'));
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
        Supplier::find($id)->update($request->all());

        return redirect()->route('supplier.index');
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
        Supplier::find($id)->delete();
    }

    public function findSupplierCriteria() {
        $suppliers = Supplier::all();
        if ($suppliers == null) {
            return $this->resonseCodeAndMessage(403, 'No Supplier');
        }
        return $this->response(200, 'success', $suppliers);
    }

    public function supplierDetail($id) {
        $supplier = Supplier::find($id);
        if($supplier == null) {
            return $this->resonseCodeAndMessage(403, 'No Supplier found!');
        }
        return $this->response(200, 'success', $supplier);
    }

    public function supplierTotal() {
        $supplier = Supplier::all();
        $countSupplier = $supplier->count();
        return $this->response(200, "success", $countSupplier);
    }

    function response($code, $message, $data) {
        return [
            'code' => $code,
            'message' => $message,
            'data' => $data
        ];
    }

    function resonseCodeAndMessage($code, $message) {
        return [
            'code' => $code,
            'message' => $message
        ];
    }
}
