<?php

namespace App\Http\Controllers\operation\Reports;

use Carbon\Carbon;
use App\PerformanceByModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class performanceByModelController extends Controller
{
    public function index()
    {
        
        $operationsReport = PerformanceByModel::all();
        return view('operation.report.performance_by_model.index')
       ->with('operationsReport',$operationsReport);

    }
    
    public function store(Request $request)
    {
        $format = 'd-m-Y';
        $start = $request->input('startDate');
        $end = $request->input('endDate');
        
        $first = Carbon::createFromDate($request->input('startDate'));
        $second = Carbon::createFromDate($request->input('endDate'));
        $date_diff = ( strtotime( $start ) - strtotime( $end ) );
        $diff = abs( strtotime( $end ) - strtotime( $start ) );

    $years = floor( $diff / ( 365 * 60 * 60 * 24 ) );
    $months = floor( ( $diff - $years * 365 * 60 * 60 * 24 ) / ( 30 * 60 * 60 * 24 ) );
    $days = floor( ( $diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24 ) / ( 60 * 60 * 24 ) );

    if ( $end > $start) {

        $tds = DB::table('performance_by_model_report_views')
        ->select('vehecletype_id', 'name', 'no', 'Trip', 'dwc', 'dwoc', 'Tone', 'KM', 'Tonek', 'fl', 'fib', 'Perdium', 'other', 'totla')
      //  ->whereBetween('performance_by_model_report_views.at', [$first->toDateTimeString(), $second->toDateTimeString()])
         ->get();


        return view('operation.report.performance_by_model.create')
        ->with('tds',$tds)
        ->with('start',$start)
        ->with('end',$end)
        ->with('months',$months)
        ->with('days',$days)
        ->with('years',$years);
    }else{
        
            Session::flash('info', 'Cheeck the input Date Please' );
            return redirect()->route('performance_by_model');
        
    }

}

    

}
