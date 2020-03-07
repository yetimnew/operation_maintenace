<?php

namespace App\Http\Controllers;

use App\DriverTuck;
use Illuminate\Http\Request;

class TruckDriverController extends Controller
{
    public function index()
    {
        // dd(App\Status::find(2)->vehecletype->name);
        $dts = DriverTuck::all();
       
     
        // $statuses = DB::table('statuses')
        // ->join('statustypes','statustypes.id','=','statustype_id')
        // ->select('statuses.*','statustypes.name as Name')->get();
        return view('operation.performance.index')->with('dts',$dts);
        
    }

    public function create()
    {
        $operations=  DB::table('operations')->where('status','=',1)->get();
     return view('operation.performance.create')->with('operations',$operations);
    }

    public function store(Request $request)
    {
         // dd($request->all());
         $this->validate($request, [

            'name' => 'required', 
            'comment' => 'required'

        ]);

        $region = new Performance;
        $region->name = $request->name;
        $region->comment = $request->comment;
     
       
        $region->save();
        Session::flash('success', 'region  registerd successfuly' );
        return redirect()->route('region');
    }
 

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $statustypes = Performance::all();
        $performance = Status::findOrFail($id);
        // return $performance;
        return view('operation.performance.edit')->with('performance',$performance)->with('statustypes',$statustypes);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required', 
            'type' => 'required'
            
            ]);
    
            $performance = Status::findOrFail($id);
            $performance->name = $request->name;
        $performance->statusgroup = $request->type;
        $performance->comment = $request->comment;
            $performance->save();
            Session::flash('success', 'Status group updated successfuly' );
            return redirect()->route('performance');
    }

   
    public function destroy($id)
    {
        $performance = Status::findOrFail($id);
        $performance->delete();
        Session::flash('success', 'Status group deleted successfuly' );
        return redirect()->back();

    }
}
