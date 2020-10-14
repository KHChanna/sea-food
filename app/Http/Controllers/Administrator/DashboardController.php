<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Register;
use App\Models\Sale;
use App\Models\SaleDetail;
use App\Models\Supplier;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::count();
        $sale_detail = SaleDetail::whereDate('created_at', Carbon::today())->sum('total');
        $products = Product::count();
        $suppliers = Supplier::count();
        $registry = Register::whereDate('created_at', Carbon::today())->first();

        // return Carbon::parse('first friday')->weekOfMonth;
        $startDate = Carbon::now(); 
        $firstDay = $startDate->firstOfMonth();

        $now = Carbon::now(); 
        $sales = Sale::whereMonth('created_at', date('m'))->get();
        // $calls = \DB::table('sells') 
        //     ->whereBetween('created_at', [Carbon::now()->subWeek()->format("Y-m-d H:i:s"), Carbon::now()])
        //     ->get();
        // return date('Y-m-d', strtotime($now));
        // return $sales;
        

        return view('administrator.dashboard', compact('users', 'sale_detail', 'products', 'suppliers', 'registry'));
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
        //
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

    public function calulateSaleofMonth()
    {

    }
}
