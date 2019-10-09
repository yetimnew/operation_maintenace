<?php

namespace App\Http\Controllers;

use App\User;
use App\Truck;
use App\Vehecletype;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Permission;

class TruckController extends Controller
{

    public function index()
    {
        // Role::create(['name'=>'admin']);
        // Permission::create(['name'=>'create truck']);
        // $role = Role::findById(1);
        // $role->givePermissionTo($pr);
        // return auth()->user()->givePermissionTo('create truck');
        // auth()->user()->assignRole('super');
    //    return auth()->user()->permissions;
        //  $trucks = Truck::all();
    //     $pr = 
    //    $user=  User::role('statstician')->get();
    //    dd($user);
        $trucks = DB::table('trucks')
        ->join('vehecletypes','vehecletypes.id','=','vehecletype_id')
        ->select('trucks.*','vehecletypes.name as Name')
        ->where('trucks.status','=',1)->latest()->get();
        return view('operation.truck.index')->with('trucks',$trucks);
    }

    public function create()
    {
        $truck = new Truck;
        $vehcletypes = Vehecletype::all();
    if ($vehcletypes->count()== 0) {
        Session::flash('info', 'You must have some Vehecle Model before attempting to create Truck' );
        return redirect()->route('vehecletype');
    }
    // Session::flash('success', 'vehecle type registerd successfuly');
     return view('operation.truck.create')
     ->with('truck',$truck)
     ->with('vehcletypes',$vehcletypes);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
        'plate' => 'required|unique:trucks,plate|max:20', 
        'vehecle' => 'required', 
        'chan' =>  'nullable|unique:trucks,chasisNumber|max:80',
        'engin' =>  'nullable|unique:trucks,engineNumber|max:80', 
        'tyre' =>  'nullable|integer',
        'sik' =>  'nullable|integer',
        'price' => 'nullable|integer',
        'pdate' =>  'nullable|date',
        'ssdate' =>  'nullable|date'
        ]);

        $truck = new Truck;
        $truck->plate = $request->plate;
        $truck->vehecletype_id = $request->vehecle;
        $truck->chasisNumber = $request->chan;
        $truck->engineNumber = $request->engin;
        $truck->tyreSyze = $request->tyre;
        $truck->serviceIntervalKM = $request->sik;
        $truck->purchasePrice = $request->price;
        $truck->productionDate = $request->pdate;
        $truck->serviceStartDate = $request->ssdate;
        $truck->save();
        Session::flash('success', 'Truck  registerd successfuly' );
        return redirect()->route('truck');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $truck = Truck::find($id);
        $vehcletypes = Vehecletype::all();
        return view('operation.truck.edit')
        ->with('truck',$truck)
        ->with('vehcletypes',$vehcletypes);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'plate' => 'required', 
            'vehecle' => 'required', 
            'chan' =>  'nullable',
            'engin' =>  'nullable', 
            'tyre' =>  'nullable|integer',
            'sik' =>  'nullable|integer',
            'price' => 'nullable|integer',
            'pdate' =>  'nullable|date',
            'ssdate' =>  'nullable|date'
                      
            ]);
    
            $truck = Truck::find($id);
            $truck->plate = $request->plate;
            $truck->vehecletype_id = $request->vehecle;
            $truck->chasisNumber = $request->chan;
            $truck->engineNumber = $request->engin;
            $truck->tyreSyze = $request->tyre;
            $truck->serviceIntervalKM = $request->sik;
            $truck->purchasePrice = $request->price;
            $truck->productionDate = $request->pdate;
            $truck->serviceStartDate = $request->ssdate;
            $truck->save();
            Session::flash('success', 'Truck updated successfuly' );
            return redirect()->route('truck');
    }

   
    public function destroy($id)
    {
        $truck = Truck::find($id);
        $truck->status = 0;
        $truck->save();
        Session::flash('success', 'vehecle type deleted successfuly' );
        return redirect()->back();

    }
}
