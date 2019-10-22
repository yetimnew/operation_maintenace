<?php

namespace App\Http\Controllers;

use App\Statustype;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StatustypeController extends Controller
{
    public function index()
    {

        $statustypes = Statustype::all();
        return view('operation.statustype.index')->with('statustypes',$statustypes);
    }

    public function create()
    {

     return view('operation.statustype.create');
    }

    public function store(Request $request)
    {
        // dd( $request->all());
        $this->validate($request, [
        'name' => 'required|unique:statustypes', 
        'type' => 'required', 
        // 'comment' =>  'required',
       
        ]);

        $statustype = new Statustype;
        $statustype->name = $request->name;
        $statustype->statusgroup = $request->type;
        $statustype->comment = $request->comment;
        $statustype->save();
        Session::flash('success', 'Status group registerd successfuly' );
        return redirect()->route('statustype');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $statustype = Statustype::findOrFail($id);
        // return $statustype;
        return view('operation.statustype.edit')->with('statustype',$statustype);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required', 
            'type' => 'required'
            
            ]);
    
        $statustype = Statustype::find($id);
        $statustype->name = $request->name;
        $statustype->statusgroup = $request->type;
        $statustype->comment = $request->comment;
        $statustype->save();
        Session::flash('success', 'Status group updated successfuly' );
        return redirect()->route('statustype');
    }

   
    public function destroy($id)
    {
        $statustype = Statustype::find($id);
        $statustype->status = 0;
        $statustype->save();
        Session::flash('success', 'Status group deleted successfuly' );
        return redirect()->back();

    }
}
