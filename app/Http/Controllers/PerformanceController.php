<?php
namespace App\Http\Controllers;

use App\Place;
use App\Truck;
use App\Driver;
use App\Operation;
use Carbon\Carbon;
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
        $performances = Performance::active()->latest()->maintrip()->get();
        $statuslist= $this->statusList();
        $trucks = Truck::all();
        $drivers = Driver::all();
    
          return view('operation.performance.index')
        ->with('performances',$performances)
        ->with('trucks',$trucks)
        ->with('statuslist',$statuslist)
        ->with('drivers',$drivers);
        
     }
  
    public function create()
    {
        auth()->user()->notify( new PerformanceCreated);
        $performance = new  Performance;
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
     ->with('performance',$performance)
     ->with('place',$place);
    }

    public function store(Request $request)
    {
        // dd($request->all());
       
         $this->validate($request, [
            'trip' => 'required',
            'chinet' => 'required',
            'fo' => 'required|unique:performances,FOnumber',
            'operation' => 'required',
            'truck' => 'required',
            'ddate' => 'required|date',
            'origion' => 'nullable',
            'destination' => 'different:origion',
            'diswc' => 'nullable|numeric',
            'diswoc' => 'nullable|numeric',
            'tonkm' => 'required|numeric',
            'cargovol' => 'required|numeric',
            'fuell' => 'nullable|numeric',
            'fuelb' => 'nullable|numeric',
            'perdiem' => 'nullable|numeric',
            'wog' => 'nullable|numeric',
            'other' => 'nullable|numeric',
            'comment' => '',

        ]);

         $performance = new Performance;
         $performance->trip = $request->trip ;
         $performance->LoadType = $request->chinet ;
         $performance->FOnumber = $request->fo;
         $performance->operation_id = $request->operation ;
         $performance->driver_truck_id = $request->truck ;
         $performance->DateDispach = $request->ddate ;
         $performance->orgion_id = $request->origion ;
         $performance->destination_id = $request->destination ;
         $performance->DistanceWCargo = $request->diswc;
         $performance->DistanceWOCargo = $request->diswoc ;
         $performance->tonkm = $request->tonkm ;
         $performance->CargoVolumMT = $request->cargovol ;
        //  $performance->tonkm = (($request->diswc ) * ($request->cargovol)) ;
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
        $performance = Performance::findOrFail($id);
        $start =  Carbon::parse($performance->DateDispach);
        $end  =  Carbon::parse($performance->returned_date);
        $difinday = $end->diffInDays($start);
        $diffinhour = $end->diffInHours($start);


        $operations = Operation::all();     
    
        $driver_detail =  DB::table('driver_truck')
        ->select('driver_truck.id','driver_truck.driverid', 'driver_truck.plate', 
        'driver_truck.date_recived', 'driver_truck.status','drivers.name')
        ->LEFTJOIN('drivers','drivers.driverid','=','driver_truck.driverid')
       ->where('driver_truck.id', '=', $performance->driver_truck_id )
        ->get();
        return view('operation.performance.show')
        ->with('performance',$performance)
        ->with('operations',$operations)
        ->with('difinday',$difinday)
        ->with('diffinhour',$diffinhour)
        ->with('driver_detail',$driver_detail);
    }

    public function edit($id)
    {
 
        $performance = Performance::findOrFail($id);
        $operations = Operation::all();
        $place = Place::all();
        $trucks =  $this->driver_truck();
        return view('operation.performance.edit')
        ->with('performance',$performance)
        ->with('operations',$operations)
        ->with('place',$place)
        ->with('trucks',$trucks);
        // ->with('drivers',$drivers);
       
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $this->validate($request, [
            'trip' => 'required',
            'chinet' => 'required',
            'fo' => 'required',
            'operation' => 'required',
            'truck' => 'required',
            'ddate' => 'required|date',
            'origion' => 'nullable',
            'destination' => 'different:origion',
            'diswc' => 'nullable|numeric',
            'diswoc' => 'nullable|numeric',
            'tonkm' => 'required|numeric',
            'cargovol' => 'required|numeric',
            'fuell' => 'nullable|numeric',
            'fuelb' => 'nullable|numeric',
            'perdiem' => 'nullable|numeric',
            'wog' => 'nullable|numeric',
            'other' => 'nullable|numeric',
            'returned' => '',
            'r_date' => 'nullable|date|after:ddate',

        ]);
  
            $performance = Performance::find($id);
            $performance->trip = $request->trip ;
            $performance->LoadType = $request->chinet ;
            $performance->FOnumber = $request->fo;
            $performance->operation_id = $request->operation ;
            $performance->driver_truck_id = $request->truck ;
            $performance->DateDispach = $request->ddate ;
            $performance->orgion_id = $request->origion ;
            $performance->destination_id = $request->destination ;
            $performance->DistanceWCargo = $request->diswc;
            $performance->DistanceWOCargo = $request->diswoc ;
            $performance->tonkm = $request->tonkm ;
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
            Session::flash('success', 'Fo  Number '.$performance->FOnumber . ' updated successfuly' );
            return redirect()->route('performace.show',['id'=>$performance->id]);
    }

    public function destroy($id)
    {
        // dd($id);
        $performance = Performance::find($id);
        $performance->delete();
        Session::flash('success', 'Performance deleted successfuly' );
        return redirect()->route('performace');

    }
    public function statusList()
    {
        return [
            'All' => Performance::active()->count(),
            'Returned' => Performance::returned()->count(),
            'Not returned' => Performance::notreturned()->count(),
        ];
    }
    public function driver_truck()
    {
        $trucks =  DB::table('driver_truck')
        ->select('driver_truck.id','driver_truck.driverid', 'driver_truck.plate', 'driver_truck.date_recived', 'driver_truck.status','drivers.name')
        ->LEFTJOIN('drivers','drivers.driverid','=','driver_truck.driverid')
        ->get();
        return $trucks;
    }


}
