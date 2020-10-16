<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Sale;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = [];
        if ($request->type == 'this_week'){
            $data = $this->getThisWeekRecord();
        } else if ($request->type == 'last_week') {
            $data = $this->getLastWeekRecord();
        } else if ($request->type == 'this_month') {
            $data = ['No data'];
        } else {
            $data = [
                'message' =>'Invalid type, please make sure you give the correct type',
                'type' => [
                    'this_week',
                    'last_week',
                    'this_month',
                ]
            ];
        }
        
        return response()->json( [
            'data' => [
                    $data
            ]
        ] );
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

    public function getThisWeekRecord()
    {
        $this_week = Carbon::now();
        $this_week_start = $this_week->startOfWeek()->format('Y-m-d');
        $this_week_end = $this_week->endOfWeek()->format('Y-m-d');
        $sale_this_weeks = Sale::whereBetween('created_at', 
            [date('Y/m/d', strtotime($this_week_start)).' 00:00:00', date('Y/m/d', strtotime($this_week_end)). ' 00:00:00' ]
        )
        ->orderby('created_at', 'ASC')
        ->get();

        $data['monday']      = 0;
        $data['tuesday']     = 0;
        $data['wednesday']   = 0;
        $data['thursday']    = 0;
        $data['friday']      = 0;
        $data['saturday']    = 0;
        $data['sunday']      = 0;

        foreach ($sale_this_weeks as $key => $value) {
            if ( date('Y/m/d', strtotime($value->created_at)) == date('Y/m/d', strtotime($this_week_start)) )
                $data['monday'] += $value->total;

            if ( date('Y/m/d', strtotime($value->created_at)) == date('Y/m/d', strtotime($this_week_start . ' + 1 days')) )
                $data['tuesday'] += $value->total;

            if ( date('Y/m/d', strtotime($value->created_at)) == date('Y/m/d', strtotime($this_week_start . ' + 2 days')) )
                $data['wednesday'] += $value->total;

            if ( date('Y/m/d', strtotime($value->created_at)) == date('Y/m/d', strtotime($this_week_start . ' + 3 days')) )
                $data['thursday'] += $value->total;

            if ( date('Y/m/d', strtotime($value->created_at)) == date('Y/m/d', strtotime($this_week_start . ' + 4 days')) )
                $data['friday'] += $value->total;
            
            if ( date('Y/m/d', strtotime($value->created_at)) == date('Y/m/d', strtotime($this_week_start . ' + 5 days')) )
                $data['saturday'] += $value->total;
            
            if ( date('Y/m/d', strtotime($value->created_at)) == date('Y/m/d', strtotime($this_week_start . ' + 5 days')) )
                $data['sunday'] += $value->total;
        }

        return $data;
    }

    public function getLastWeekRecord()
    {
        // sale last week
        $last_week = Carbon::now();
        $last_start_week = $last_week->subDays($last_week->dayOfWeek)->subWeek();// gives 2016-01-31
        $last_start_week->addDays(1);
        $last_end_week = new Carbon($last_start_week);
        $last_end_week->addDays(6);

        $sale_last_weeks = Sale::whereBetween('created_at', 
            [date('Y/m/d', strtotime($last_start_week)).' 00:00:00', date('Y/m/d', strtotime($last_end_week)). ' 00:00:00' ]
        )
        ->orderBy('created_at', 'ASC')
        ->get();

        $data['monday']      = 0;
        $data['tuesday']     = 0;
        $data['wednesday']   = 0;
        $data['thursday']    = 0;
        $data['friday']      = 0;
        $data['saturday']    = 0;
        $data['sunday']      = 0;

        foreach ($sale_last_weeks as $key => $value) {
            if ( date('Y/m/d', strtotime($value->created_at)) == date('Y/m/d', strtotime($last_start_week)) )
                $data['monday'] += $value->total;

            if ( date('Y/m/d', strtotime($value->created_at)) == date('Y/m/d', strtotime($last_start_week . ' + 1 days')) )
                $data['tuesday'] += $value->total;

            if ( date('Y/m/d', strtotime($value->created_at)) == date('Y/m/d', strtotime($last_start_week . ' + 2 days')) )
                $data['wednesday'] += $value->total;

            if ( date('Y/m/d', strtotime($value->created_at)) == date('Y/m/d', strtotime($last_start_week . ' + 3 days')) )
                $data['thursday'] += $value->total;

            if ( date('Y/m/d', strtotime($value->created_at)) == date('Y/m/d', strtotime($last_start_week . ' + 4 days')) )
                $data['friday'] += $value->total;
            
            if ( date('Y/m/d', strtotime($value->created_at)) == date('Y/m/d', strtotime($last_start_week . ' + 5 days')) )
                $data['saturday'] += $value->total;
            
            if ( date('Y/m/d', strtotime($value->created_at)) == date('Y/m/d', strtotime($last_start_week . ' + 5 days')) )
                $data['sunday'] += $value->total;
        }

        return $data;
    }
}
