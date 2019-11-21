<?php

namespace App\Http\Controllers;

use App\Truck;
use App\Driver;
use App\DriverTuck;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class TruckDriverController extends Controller
{
    public function index()
    {
        $dts= DB::table('driver_truck')
        ->join('drivers','drivers.driverid','=','driver_truck.driverid')
        ->join('trucks','trucks.plate','=','driver_truck.plate')
        ->select('driver_truck.*','drivers.name as Name','trucks.plate as plate')
        ->where('driver_truck.status','=',1)->get();
        return view('operation.drivertruck.index')->with('dts',$dts);
    }

    public function create()
    {
        $truckss = Truck::all();
        $dr = Driver::all();

        if ($truckss->count()== 0) {
            Session::flash('info', 'You must have some Trukes  before attempting to create Truck' );
            return redirect()->route('truck');
        }

        if ($dr->count()== 0) {
            Session::flash('info', 'You must have some Driver  before attempting to create Truck' );
            return redirect()->route('driver');
        }
  


            $trucks= DB::table('trucks')
            ->select('trucks.id','trucks.plate','driver_truck.driverid','trucks.status','driver_truck.status')
            ->leftjoin('driver_truck','driver_truck.plate','=','trucks.plate')
            ->whereNull('driver_truck.status')
            ->orwhere('driver_truck.status','=',0) 
            ->whereNull('driver_truck.is_attached')
            ->orwhere('driver_truck.is_attached','=',0) 
            ->where('trucks.status','=',1) 
            ->groupBy('trucks.plate')
            ->orderBy('trucks.plate','asc')
            // ->tosql();
            ->get();
      
            $drivers= DB::table('drivers')
            ->select('drivers.id','drivers.driverid as driverID','drivers.name','driver_truck.driverid as DTID','drivers.status','driver_truck.status')
            ->leftjoin('driver_truck','driver_truck.driverid','=','drivers.driverid')
           
            ->whereNull('driver_truck.status')
             ->orwhere('driver_truck.status','=',0) 
            ->whereNull('driver_truck.is_attached')
            ->orwhere('driver_truck.is_attached','=',0) 
            ->where('drivers.status','=',1) 
            // ->where('driver_truck.status','<>',0) 
            ->groupBy('drivers.name')
            ->orderBy('drivers.name','asc')
            ->get();
            
   

        return view('operation.drivertruck.create')
            ->with('drivers',$drivers)
            ->with('trucks',$trucks);
    }

    public function store(Request $request)
    {
       $this->validate($request, [
        'plate' => 'required', 
        'dname' => 'required', 
        'rdate' => 'required', 
        ]);

        $plate = $request->input('plate');
        $driverId = $request->input('dname');

        $drivers= DB::table('driver_truck')
        ->select('driver_truck.driverid','driver_truck.status','driver_truck.plate')
        ->where('driver_truck.plate','=',$plate)
        ->orwhere('driver_truck.driverid','=',$driverId)
        // ->where('driver_truck.driverid','=',$driverId)
        ->where('driver_truck.status','=',1)
        ->where('driver_truck.is_attached','=',1)
        ->get();
            
    if($drivers->count() > 0){
     
         Session::flash('info', 'vehecle or driver is Active. Deatache before Attaching' );
        return redirect()->route('drivertruck.create');
    }else{
        $dt = new DriverTuck;
        $dt->driverid = $request->dname;
        $dt->plate = $request->plate;
        $dt->date_recived = $request->rdate;
        $dt->status = 1;
       
        $dt->save();
        Session::flash('success', 'Truck and Driver Assiegned successfuly' );
        return redirect()->route('drivertruck');
  
    }
 
    }

    public function edit($id)
    {

        $dts= DB::table('driver_truck')
        ->select('driver_truck.*','drivers.name as NAME')
        ->join('drivers','drivers.driverid','=','driver_truck.driverid')
        ->where('driver_truck.id','=',$id) 
        ->first();
        //  dd($dts);

        $trucks= DB::table('trucks')
        ->select('trucks.id','trucks.plate','driver_truck.driverid','trucks.status','driver_truck.status')
        ->leftjoin('driver_truck','driver_truck.plate','=','trucks.plate')
        ->whereNull('driver_truck.status')
        ->orwhere('driver_truck.status','=',0) 
        ->orwhere('trucks.status','=',1) 
        ->orderBy('trucks.plate','asc')
        ->get();
        // dd($trucks);

        $drivers= DB::table('drivers')
        ->select('drivers.id','drivers.driverid','drivers.name','driver_truck.driverid as DTID','drivers.status','driver_truck.status')
        ->leftjoin('driver_truck','driver_truck.driverid','=','drivers.driverid')
        ->whereNull('driver_truck.status')
        ->orwhere('driver_truck.status','=',0) 
        ->orwhere('drivers.status','=',1) 
        // ->where('driver_truck.status','<>',0) 
        ->orderBy('drivers.name','asc')
        ->groupBy('drivers.name')
        ->get();

        return view('operation.drivertruck.edit')->with('dts',$dts)->with('trucks',$trucks)->with('drivers', $drivers);
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $this->validate($request, [
            'dname' => 'required'
              ]);
    
            $dt = DriverTuck::find($id);
            $dt->driverid = $request->dname;
            $dt->plate = $request->plate;
            $dt->date_recived = $request->rdate;
            $dt->date_detach = $request->ddate;
            $dt->reason = $request->comment;
            $dt->save();
            Session::flash('success', 'Truck and Driver Edited successfuly' );
           return redirect()->route('drivertruck');
    }

   
    public function destroy($id)
    {
        $vehecletype = DriverTuck::find($id);
        $vehecletype->status = 0;
        $vehecletype->save();
        Session::flash('success', 'Vehecle and Driver deleted successfuly' );

        return redirect()->back();

    }
    public function detach($id)
    {
        $dts= DB::table('driver_truck')
        ->select('driver_truck.*','drivers.name as NAME')
        ->join('drivers','drivers.driverid','=','driver_truck.driverid')
        ->where('driver_truck.id','=',$id) 
        ->first();
        return view('operation.drivertruck.detach')->with('dts',$dts);
        // return view('operation.drivertruck.detach')->with('dt',$dt);
    }
    
    public function update_dt(Request $request, $id)
    {
        $this->validate($request, [
            'dname' => 'required',
            'ddate' => 'required|date'
              ]);
    
            $dt = DriverTuck::find($id);
            $dt->driverid = $request->dname;
            $dt->plate= $request->plate;
            $dt->date_recived = $request->rdate;
            $dt->date_detach = $request->ddate;
            $dt->reason = $request->comment;
            // $dt->status = 0;
            $dt->is_attached = 0;
            $dt->save();
            Session::flash('success', 'Truck and Driver Detached successfuly' );
           return redirect()->route('drivertruck');
    }

}
