<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Sale;
use App\Models\SaleDetail;
use Carbon\Carbon;
use Carbon\Traits\Week;
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
            $data = $this->getThisMonth();
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
     * Best selling
     *
     * @return \Illuminate\Http\Response
     */
    public function bestSelling()
    {
        // $best_sale = SaleDetail::whereDate('created_at', Carbon::today())->select('product_id')->orderBy('product_id', 'ASC')->get();
        // foreach ($best_sale as $key => $value) {
            
        // }

        // return $data;
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

    public function getThisMonth()
    {
        $start = new Carbon('first day of last month');
        $end = new Carbon('last day of last month');

        $start = $start->addMonth(1)->toDateString();

        $week1 = Sale::whereMonth('created_at', date('m'))
                ->whereBetween('created_at', [$start . ' 00:00:00', date('Y/m/d', strtotime($start . ' + 6 days')).' 00:00:00'])
                ->sum('total');

        $week2 = Sale::whereMonth('created_at', date('m'))
            ->whereBetween('created_at', [date('Y/m/d', strtotime($start . ' + 7 days')) . ' 00:00:00', date('Y/m/d', strtotime($start . ' + 13 days')).' 00:00:00'])
            ->sum('total');

        $week3 = Sale::whereMonth('created_at', date('m'))
            ->whereBetween('created_at', [date('Y/m/d', strtotime($start . ' + 13 days')) . ' 00:00:00', date('Y/m/d', strtotime($start . ' + 20 days')).' 00:00:00'])
            ->sum('total');

        $week4 = Sale::whereMonth('created_at', date('m'))
            ->whereBetween('created_at', [date('Y/m/d', strtotime($start . ' + 21 days')) . ' 00:00:00', date('Y/m/d', strtotime($start . ' + 27 days')).' 00:00:00'])
            ->sum('total');
        
        return [ 
           'week1'  =>  $week1,
           'week2'  =>  $week2,
           'week3'  =>  $week3,
           'week4'  =>  $week4,
        ];
    }
}
