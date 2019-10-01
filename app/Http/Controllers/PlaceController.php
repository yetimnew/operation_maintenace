<?php

namespace App\Http\Controllers;

use App\Place;
use App\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PlaceController extends Controller
{
    public function index()
    {
        // dd(App\place::find(2)->vehecletype->name);
        $places = Place::where('status',1)->get();
        // $places =  DB::table('places')->join('regions','regions.id','=','region_id')
        // ->select('places.*','regions.name as rname')->get();
        return view('operation.place.index')->with('places',$places);
    }

    public function create()
    {
        $place = new Place;   
        $regions = Region::all();
            if ($regions->count()== 0) {
                Session::flash('info', 'You must have some Region  before attempting to create Truck' );
                return redirect()->route('region');
            }
                return view('operation.place.create')
                ->with('place',$place)
                ->with('regions',$regions);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [

            'name' => 'required|unique:places', 
            'region' => 'required'

        ]);

        $place = new Place;
        $place->name = $request->name;
        $place->region_id = $request->region;
        $place->comment = $request->comment;
     
       
        $place->save();
        Session::flash('success', 'place  registerd successfuly' );
        return redirect()->route('place');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $place = Place::find($id);
       $regions = Region::all();
        return view('operation.place.edit')->with('place',$place)->with('regions',$regions);
    }

    public function update(Request $request, $id)
    {
        // dd( $request->all());
        $this->validate($request, [
            'name' => 'required', 
            'region' => 'required'
            
            ]);
    
            $place = Place::find($id);
            $place->name = $request->name;
            $place->region_id = $request->region;
            $place->comment = $request->comment;
        
            $place->save();
            Session::flash('success', 'place updated successfuly' );
            return redirect()->route('place');
    }

   
    public function destroy($id)
    {
        $place = Place::find($id);
        $place->status =0;
        $place->save();
        Session::flash('success', 'Region deleted successfuly' );
        return redirect()->back();

    }
}
