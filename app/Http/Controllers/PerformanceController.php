<?php

namespace App\Http\Controllers;

use App\Place;
use App\Truck;
use App\Driver;
use App\Operation;
use App\DriverTuck;
use App\Performance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Notifications\PerformanceCreated;

class PerformanceController extends Controller
{ 
    public function index()
    {

    // $pr = Performance::returned()->get();
    $performances = Performance::active()->latest()->get();
        $statuslist= $this->statusList();
        $trucks = Truck::all();
        $drivers = Driver::all();
        // dd( $pr);
          return view('operation.performance.index')
        ->with('performances',$performances)
        ->with('trucks',$trucks)
        ->with('statuslist',$statuslist)
        ->with('drivers',$drivers);
        
     }
  
 
    public function create()
    {
        auth()->user()->notify( new PerformanceCreated);
        $performance =new  Performance;
        $operations=  DB::table('operations')->where('status','=',1)->where('closed','=',1)->get();
        $place = Place::all();
        $trucks =  DB::table('driver_truck')
        ->select('driver_truck.id','driver_truck.driverid', 'driver_truck.plate', 'driver_truck.date_recived', 'driver_truck.status','drivers.name')
        ->LEFTJOIN('drivers','drivers.driverid','=','driver_truck.driverid')
        ->LEFTJOIN('trucks','trucks.plate','=','driver_truck.plate')
        ->where('driver_truck.status',1)
        ->where('driver_truck.is_attached',1)
        ->where('drivers.status',1)
        ->where('trucks.status',1)
        // ->where('driver.status',1)
        ->get();

       if($place->count() < 2){
           Session::flash('info', 'You must have two or more Place before attempting to create Performance' );
           return redirect()->route('place.create');
       }

        if($trucks->count() == 0){
            Session::flash('info', 'You must have some Truck  before attempting to create Performance' );
            return redirect()->route('drivertruck.create');
        }
        
         if($operations->count() == 0){
            Session::flash('info', 'You must have some Operation  before attempting to create Performance' );
            return redirect()->route('operation.create');
        }
        
        
     return view('operation.performance.create')
     ->with('operations',$operations)
     ->with('trucks',$trucks)
    //  ->with('drivers',$drivers)
     ->with('performance',$performance)
     ->with('place',$place);
    }

    public function store(Request $request)
    {
        // dd($request->all());
       
         $this->validate($request, [
            'chinet' => 'required',
            'fo' => 'required|unique:performances,FOnumber',
            'operation' => 'required',
            'truck' => 'required',
            'ddate' => 'required|date',
            'origion' => 'required',
            'destination' => 'required',
            'diswc' => 'required|numeric',
            'diswoc' => 'required|numeric',
            'cargovol' => 'required|numeric',
            'fuell' => 'required|numeric',
            'fuelb' => 'required|numeric',
            'perdiem' => 'required|numeric',
            'wog' => 'required|numeric',
            'other' => 'required|numeric',
            'comment' => '',

        ]);

         $performance = new Performance;
         $performance->LoadType = $request->chinet ;
         $performance->FOnumber = $request->fo;
         $performance->operation_id = $request->operation ;
         $performance->driver_truck_id = $request->truck ;
         $performance->DateDispach = $request->ddate ;
         $performance->orgion_id = $request->origion ;
         $performance->destination_id = $request->destination ;
         $performance->DistanceWCargo = $request->diswc;
         $performance->DistanceWOCargo = $request->diswoc ;
         $performance->CargoVolumMT = $request->cargovol ;
         $performance->tonkm = (($request->diswc ) * ($request->cargovol)) ;
         $performance->fuelInLitter = $request->fuell ;
         $performance->fuelInBirr = $request->fuelb ;
         $performance->perdiem = $request->perdiem ;
         $performance->workOnGoing = $request->wog ;
         $performance->other = $request->other ;
         $performance->comment = $request->comment ;
         $performance->user_id = Auth::user()->id ;

        $performance->save();
        Session::flash('success', 'Performance  registerd successfuly' );
        return redirect()->route('performace');
    }
 

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
 
        $performance = Performance::findOrFail($id);
        $operations = Operation::all();
        $place = Place::all();
        // $trucks = Truck::all();
        $trucks =  DB::table('driver_truck')
        ->select('driver_truck.id','driver_truck.driverid', 'driver_truck.plate', 'driver_truck.date_recived', 'driver_truck.status','drivers.name')
        ->LEFTJOIN('drivers','drivers.driverid','=','driver_truck.driverid')
        // ->where('driver_truck.status',1)
        ->get();
        // $drivers = Driver::all();

        return view('operation.performance.edit')
        ->with('performance',$performance)
        ->with('operations',$operations)
        ->with('place',$place)
        ->with('trucks',$trucks);
        // ->with('drivers',$drivers);
       
    }

    public function update(Request $request, $id)
    {
        // dd( $id);
        $this->validate($request, [
            'chinet' => 'required',
            'fo' => 'required',
            'operation' => 'required',
            'truck' => 'required',
            'ddate' => 'required|date',
            'origion' => 'required',
            'destination' => 'required',
            'diswc' => 'required|numeric',
            'diswoc' => 'required|numeric',
            'cargovol' => 'required|numeric',
            'fuell' => 'required|numeric',
            'fuelb' => 'required|numeric',
            'perdiem' => 'required|numeric',
            'wog' => 'required|numeric',
            'other' => 'required|numeric',
            'returned' => '',
            'r_date' => 'nullable|date|after:ddate',

        ]);
  
            $performance = Performance::find($id);
            $performance->LoadType = $request->chinet ;
            $performance->FOnumber = $request->fo;
            $performance->operation_id = $request->operation ;
            $performance->driver_truck_id = $request->truck ;
            $performance->DateDispach = $request->ddate ;
            $performance->orgion_id = $request->origion ;
            $performance->destination_id = $request->destination ;
            $performance->DistanceWCargo = $request->diswc;
            $performance->DistanceWOCargo = $request->diswoc ;
            $performance->CargoVolumMT = $request->cargovol ;
            $performance->fuelInLitter = $request->fuell ;
            $performance->fuelInBirr = $request->fuelb ;
            $performance->perdiem = $request->perdiem ;
            $performance->workOnGoing = $request->wog ;
            $performance->other = $request->other ;
            $performance->comment = $request->comment ;
            $performance->is_returned = $request->returned ;
            $performance->returned_date = $request->r_date ;
            $performance->save();
            Session::flash('success', 'Performance  updated successfuly' );
            return redirect()->route('performace');
    }

    public function destroy($id)
    {
        $performance = Performance::find($id);
        $performance->satus = 0;
        $performance->save();
        Session::flash('success', 'Performance deleted successfuly' );
        return redirect()->back();

    }
    public function statusList()
    {
        return [
            'all' => Performance::active()->count(),
            'returned' => Performance::returned()->count(),
            'notreturned' => Performance::notreturned()->count(),
        ];
    }
    // public function returnedWith()
    // {
        
    //       return  Carbon::parse($value)->diffForHumans();
    //     # code...
    // }

}
