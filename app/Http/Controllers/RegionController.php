<?php

namespace App\Http\Controllers;

use App\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class RegionController extends Controller
{
    public function index()
    {
 
        
        $regions = Region::where('status','=',1)->get();
        return view('operation.region.index')->with('regions',$regions);
    }

    public function create()
    {
    $region = new Region;
     return view('operation.region.create')->with('region',$region);
    }

    public function store(Request $request)
    {
      
        $this->validate($request, [

            'name' => 'required', 
            'comment' => 'required'

        ]);

        $region = new Region;
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
        $region = Region::findOrFail($id);
        // return $region;
        return view('operation.region.edit')->with('region',$region);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'comment' => 'required'
            
            ]);
    
            $region = Region::find($id);
            $region->name = $request->name;
            $region->comment = $request->comment;
        
            $region->save();
            Session::flash('success', 'region updated successfuly' );
            return redirect()->route('region');
    }

   
    public function destroy($id)
    {
        $region = Region::find($id);
        $region->status = 0;
        $region->save();
        Session::flash('success', 'Region deleted successfuly' );
        return redirect()->back();

    }
}
