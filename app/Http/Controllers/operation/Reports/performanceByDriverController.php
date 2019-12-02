<?php
namespace App\Http\Controllers\operation\Reports;
use App\Truck;
use App\Driver;
use App\Performance;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class performanceByDriverController extends Controller
{

    public function index()
    {
        $drivers =DB::table('drivers')->orderBy('name','ASC')->get();
        $tds = DB::table('performance_by_driver_view')
             ->get();
        return view('operation.report.performance_by_driver.index')
         ->with('tds',$tds)
         ->with('drivers',$drivers);
       
    }


    public function store(Request $request)
    {
    $format = 'd-m-Y';
    $driver = $request->input('driver');
    $start = $request->input('startDate');
    $end = $request->input('endDate');

    $first = Carbon::createFromDate($start);
    $second = Carbon::createFromDate( $end);
    $date_diff = ( strtotime( $start ) - strtotime( $end ) );
    $diff = abs( strtotime( $end ) - strtotime( $start ) );

    $years = floor( $diff / ( 365 * 60 * 60 * 24 ) );
    $months = floor( ( $diff - $years * 365 * 60 * 60 * 24 ) / ( 30 * 60 * 60 * 24 ) );
    $days = floor( ( $diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24 ) / ( 60 * 60 * 24 ) );

    if ( $end >= $start) {

        $tds = DB::table('performance_by_driver_view')
        ->where('driverid','=',$driver)
        ->whereBetween('DateDispach', [$first->toDateTimeString(), $second->toDateTimeString()])
         ->get();


        return view('operation.report.performance_by_driver.create')
        ->with('tds',$tds)
        ->with('start',$start)
        ->with('end',$end)
        ->with('months',$months)
        ->with('days',$days)
        ->with('years',$years);
    }else{
        
            Session::flash('info', 'Cheeck the input Date Please' );
            return redirect()->route('performance_by_driver');
        
    }

}


}
