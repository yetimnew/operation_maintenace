<?php
namespace App\Http\Controllers;
use App\Truck;
use App\Driver;
use App\Performance;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class performanceByDriverController extends Controller
{

    public function index()
    {
        $drivers =DB::table('drivers')->orderBy('name','ASC')->get();
        $tds = DB::table('performances')
        ->select('driver_truck.id','driver_truck.driverid','drivers.name','driver_truck.plate as plate'
        ,DB::raw('COUNT(performances.FOnumber) as fo')
        ,DB::raw('SUM(performances.CargoVolumMT) as CargoVolumMT') 
        ,DB::raw('SUM(performances.DistanceWCargo) as TDWC')
        ,DB::raw('SUM(performances.DistanceWOCargo) as TDWOC')
        ,DB::raw('SUM(performances.tonkm) as tonkm')
        ,DB::raw('SUM(performances.fuelInLitter) as fl')
        ,DB::raw('SUM(performances.fuelInBirr) as fB')
        ,DB::raw('SUM(performances.perdiem) as perdiem')
        ,DB::raw('SUM(performances.workOnGoing) as workOnGoing')
        ,DB::raw('SUM(performances.other) as other')
         )
        ->leftjoin('driver_truck','driver_truck.id','=','performances.driver_truck_id')
        ->leftjoin('drivers','drivers.driverid','=','driver_truck.driverid')
        // ->whereBetween('performances.DateDispach', [$first->toDateTimeString(), $second->toDateTimeString()])
        ->groupBy('driver_truck.id')
        ->orderBy('fo','DESC')
       ->get();

// dd($tds);
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

    $first = Carbon::createFromDate($request->input('startDate'));
    $second = Carbon::createFromDate($request->input('endDate'));
    $date_diff = ( strtotime( $start ) - strtotime( $end ) );
    $diff = abs( strtotime( $end ) - strtotime( $start ) );

    $years = floor( $diff / ( 365 * 60 * 60 * 24 ) );
    $months = floor( ( $diff - $years * 365 * 60 * 60 * 24 ) / ( 30 * 60 * 60 * 24 ) );
    $days = floor( ( $diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24 ) / ( 60 * 60 * 24 ) );


    if ( $end > $start) {

        $tds = DB::table('performances')
        ->select('driver_truck.id','driver_truck.driverid','driver_truck.plate as plate','drivers.name'
        ,DB::raw('COUNT(performances.FOnumber) as fo')
        ,DB::raw('SUM(performances.CargoVolumMT) as CargoVolumMT') 
        ,DB::raw('SUM(performances.DistanceWCargo) as TDWC')
        ,DB::raw('SUM(performances.DistanceWOCargo) as TDWOC')
        ,DB::raw('SUM(performances.tonkm) as tonkm')
        ,DB::raw('SUM(performances.fuelInLitter) as fl')
        ,DB::raw('SUM(performances.fuelInBirr) as fB')
        ,DB::raw('SUM(performances.perdiem) as perdiem')
        ,DB::raw('SUM(performances.workOnGoing) as workOnGoing')
        ,DB::raw('SUM(performances.other) as other')
         )
        ->leftjoin('driver_truck','driver_truck.id','=','performances.driver_truck_id')
        ->leftjoin('drivers','drivers.driverid','=','driver_truck.driverid')
        ->where('driver_truck.driverid','=',$driver)
        // ->orWhere('driver_truck.driverid','!=',"*")
        ->whereBetween('performances.DateDispach', [$first->toDateTimeString(), $second->toDateTimeString()])
        ->groupBy('driver_truck.id')
        ->orderBy('fo','DESC')
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
