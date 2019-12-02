<?php

namespace App\Http\Controllers;

use App\Place;
use App\Distance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class DistanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $place =  DB::table('places')
        ->select('places.*')
        ->LEFTJOIN('distances','origin_id','=','places.id')
               ->where('places.status',1)
        
        // ->where('driver.status',1)
        ->get();

        $distances = Distance::all();
        return view('operation.distance.index')
        ->with('distances',$distances)
        ->with('place',$place);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $places = Place::all();
        $distance = new Distance;
        return view('operation.distance.create')
        ->with('distance',$distance)
        ->with('places',$places);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'origin' => 'required', 
            'destination' => 'required|different:origin',
            'km' => 'required',
           

        ]);

            $distance = new Distance;
            $origin = $request->origin;
            $destination  = $request->destination;
            $distances =  DB::table('distances')->where('origin_id','=', $origin)->Where('destination_id','=',$destination)->get();

            $orginName_arr =  DB::table('places')->where('id','=', $origin )->pluck('name')->toArray();
            $destination_arr =  DB::table('places')->where('id','=', $destination )->pluck('name')->toArray();
            $distance_count = $distances->count();
        // dd($distance_count);
            if( $distance_count >= 1){
 
             Session::flash('error', $orginName_arr[0].' and '.$destination_arr[0]. ' alredy registerd!' );
             return redirect()->back();
                
           }else{

                $distance->origin_id =  $origin;
                $distance->origin_name=  $orginName_arr[0];
                $distance->destination_id=  $destination;
                $distance->destination_name=   $destination_arr[0];
                $distance->km= $request->km;
                  
                $distance->save();
            Session::flash('success',  ' Distance registerd successfuly' );
            return redirect()->route('distance');

           }
       

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Distance  $distance
     * @return \Illuminate\Http\Response
     */
    public function show(Distance $distance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Distance  $distance
     * @return \Illuminate\Http\Response
     */
    public function edit(Distance $distance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Distance  $distance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Distance $distance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Distance  $distance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Distance $distance)
    {
        //
    }
}
