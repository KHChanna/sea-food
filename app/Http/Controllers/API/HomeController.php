<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Sale;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $startOfCurrentWeek = Carbon::now()->startOfWeek(); 

        $startOfLastWeek  = $startOfCurrentWeek->copy()->subDays(8);
        $startOfLastWeek  = Carbon::now()->subDays(7)->startOfWeek();

        return $startOfLastWeek;
        //  ; // 2016-10-23 23:59:59.000000

        $currentDate = Carbon::now();
        // $agoDate = $currentDate->dayOfWeek;// gives 2016-01-31
        $last_start_week = $currentDate->subDays($currentDate->dayOfWeek)->subWeek();// gives 2016-01-31
        $last_end_week = $currentDate->subDays($currentDate->dayOfWeek)->endOfWeek();// gives 2016-01-31
        // $weekend = $agoDate->endOfWeek()->format('Y-m-d H:i');
        // $sale= Sale::where('created_at', ">", DB::raw('NOW() - INTERVAL 1 WEEK'))->take(100)->get();
        // return [$last_start_week ,$last_end_week];
        // return date('Y/m/d', strtotime($agoDate));
        // return Carbon::parse($agoDate);
        // return Sale::all();
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
}
