<?php

namespace App\Http\Controllers\hrm;

use App\hrm\Job;
use App\Hrm\Personale;
use App\hrm\Department;
use App\Operation\Driver;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class PersonaleController extends Controller
{

    public function index()
    {
   
        $personales = Personale::active()->orderBy('created_at','DESC')->get();
        return view('hrm.personale.index')->with('personales',$personales);
    }

    public function create()
    {
        $personale = new Personale;
        $departments = Department::orderBy('created_at','DESC')->get();
        $jobs = Job::orderBy('created_at','DESC')->get();
           return view('hrm.personale.create')
           ->with('departments',$departments)
           ->with('jobs',$jobs)
           ->with('personale',$personale);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
        
            'did' =>  'required|unique:personales,driverid',
            'firstname' =>  'required|min:2',
            'fathername' =>  'required||min:2',
            'gfathername' =>  'required||min:2',
            'sex' => 'required',
            'driver' => 'required',
            'bdate' =>  'required|date',
            'zone' =>  'required',
            'woreda' =>  'required',
            'kebele' =>  'required',
            'hn' =>  'required',
            'mob' =>  'required',
            'hd' =>  'required|date',
            'department' =>  'required',
            'job' =>  'required',

        ]);

            $personale = new Personale;
            $personale->driverid= $request->did;
            $personale->firstname= $request->firstname;
            $personale->fathername= $request->fathername;
            $personale->gfathername= $request->gfathername;
            $personale->sex= $request->sex;
            $personale->birthdate= $request->bdate;
            $personale->zone= $request->zone;
            $personale->woreda= $request->woreda;
            $personale->kebele= $request->kebele;
            $personale->housenumber= $request->hn;
            $personale->mobile= $request->mob;
            $personale->hireddate= $request->hd;
            $personale->driver= $request->driver;
            $personale->department_id= $request->department;
            $personale->job_id= $request->job;
            $personale->save();

            Session::flash('success',  $personale->id .  ' registerd successfuly' );
            return redirect()->route('personale');
    }

    public function show($id)
    {
        $personale = Personale::findOrFail($id);
        return view('hrm.personale.show')
        ->with('personale',$personale);
    }

    public function edit($id)
    {
        $personale = Personale::findOrFail($id);
        $departments = Department::all();
        $jobs = Job::all();
        return view('hrm.personale.edit')
        ->with('personale',$personale)
        ->with('departments',$departments)
        ->with('jobs',$jobs);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'did' =>  'required',
            'firstname' =>  'required',
            'fathername' =>  'required',
            'gfathername' =>  'required',
            'sex' => 'required',
            'driver' => 'required',
            'bdate' =>  'required',
            'zone' =>  'required',
            'woreda' =>  'required',
            'kebele' =>  'required',
            'hn' =>  'required',
            'mob' =>  'required',
            'hd' =>  'required',
            'department' =>  'required',
            'job' =>  'required',
            
            ]);
    
            $personale = Personale::findOrFail($id);
           
            $personale->driverid= $request->did;
            $personale->firstname= $request->firstname;
            $personale->fathername= $request->fathername;
            $personale->gfathername= $request->gfathername;
            $personale->sex= $request->sex;
            $personale->birthdate= $request->bdate;
            $personale->zone= $request->zone;
            $personale->woreda= $request->woreda;
            $personale->kebele= $request->kebele;
            $personale->housenumber= $request->hn;
            $personale->mobile= $request->mob;
            $personale->hireddate= $request->hd;
            $personale->driver= $request->driver;
            $personale->department_id= $request->department;
            $personale->job_id= $request->job;

            $personale->save();
            Session::flash('success',  $personale->if . ' updated successfuly' );
            return redirect()->route('personale');
    }

   
    public function destroy($id)
    {
        $driver = Personale::findOrFail($id);
 
            $driver->status= 0 ;
            $driver->save();
            Session::flash('success', $driver->name . ' deleted successfuly' );
            return redirect()->route('personale');

       
    }
}
