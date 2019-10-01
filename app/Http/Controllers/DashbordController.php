<?php

namespace App\Http\Controllers;

use App\Truck;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashbordController extends Controller
{
 
    public function index()
    {
        $number_of_trucks = DB::table('trucks')->where('status','!=',0)->count();
        $number_of_drivers = DB::table('drivers')->where('status','!=',0)->count();
        $operations= DB::table('operations')->where('closed','=',1)->count();
        $totalTone = DB::table('operations')->where('status','=',1)->sum('volume');
        $upliftedTone = DB::table('performances')->where('satus','=',1)->sum('CargoVolumMT');
        $maxStatus= DB::table('statuses')->MAX('autoid');
        $maxDate= DB::table('statuses')->MAX('registerddate');



        $tds = DB::table('statuses')
        ->select('statustypes.name','statustypes.statusgroup','statuses.registerddate'
        ,DB::raw('COUNT(statuses.statustype_id) as Number'))
        ->join('statustypes','statustypes.id','=','statuses.statustype_id')
        ->where('statuses.autoid','=',$maxStatus)
        ->groupBy('statuses.statustype_id')
       ->get();

        $statuses = DB::table('statuses')
        ->select('statustypes.statusgroup'
        ,DB::raw('COUNT(statuses.statustype_id) as status'))
        ->join('statustypes','statustypes.id','=','statuses.statustype_id')
        ->where('statuses.autoid','=',$maxStatus)
        ->groupBy('statustypes.statusgroup')
       ->get();
       // Operations
        $operationsReport = DB::table('operations')
        ->select('operations.operationid','operations.volume as Tone_Given','customers.name'
        ,DB::raw('SUM(performances.CargoVolumMT)as Tone')
        ,DB::raw('COUNT(performances.FOnumber)as fo')
        )
        ->join('customers','operations.customer_id','=','customers.id')
        ->leftjoin('performances','performances.operation_id','=','operations.id')
        ->where('operations.status','=',1)
        ->where('operations.closed','=',1)
        ->groupBy('operations.id')
       ->get();

       return view('dashboard')
       ->with('number_of_trucks',$number_of_trucks)
       ->with('number_of_drivers',$number_of_drivers)
       ->with('operations',$operations)
       ->with('totalTone',$totalTone)
       ->with('upliftedTone',$upliftedTone)
       ->with('maxDate',$maxDate)
       ->with('tds',$tds)
       ->with('operationsReport',$operationsReport)
       ->with('statuses',$statuses);
    }

}
