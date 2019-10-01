<?php

namespace App\Http\Controllers;

use App\Region;
use App\Customer;
use App\Operation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OperationController extends Controller
{
    
    public function index()
    {
         $operations = Operation::where('status','=',1)->orderBy('created_at','DESC')->get();
        return view('operation.operation.index')->with('operations',$operations);
    }

    public function create()
    {
      
        $operation = new Operation;
        $regions = Region::all();
        $customers = Customer::all();
        if($regions->count() == 0){
           Session::flash('info', 'You must have some Region before attempting to create Operation' );
            return redirect()->route('region.create');
        }
        
        if($customers->count() == 0){
            Session::flash('info', 'You must have some Customer before attempting to create Operation' );
            return redirect()->route('customer.create');
        }
    
     return view('operation.operation.create')
     ->with('regions',$regions)
     ->with('customers',$customers)
     ->with('operation',$operation);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'oid' => 'required|unique:operations,operationid',
            'customer' => 'required',
            'sdate' => 'required',
            'region' => 'required',
            'volume' => 'required|integer',
            'ctype' => 'required',
            'tone' => 'required',
            'tariff' => 'required',
            
        ]);

        $operation = new Operation;
        $operation->operationid = $request->oid;
        $operation->customer_id = $request->customer;
        $operation->startdate = $request->sdate;
        $operation->region_id = $request->region;
        $operation->volume = $request->volume;
        $operation->cargotype = $request->ctype;
        $operation->km = $request->tone;
        $operation->tariff = $request->tariff;
         $operation->save();
        Session::flash('success', 'operation  registerd successfuly' );
        return redirect()->route('operation');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {

        $operation = Operation::find($id);
        // dd($operation);

        $regions = Region::all();
        $customers = Customer::all();
        if($regions->count() == 0){
            return redirect()->route('region');
            Session::flash('info', 'You must have some Region before attempting to create Truck' );
        }
        
        if($customers->count() == 0){
            return redirect()->route('customer');
            Session::flash('info', 'You must have some Customer before attempting to create Truck' );
        }
    
        return view('operation.operation.edit')
        ->with('operation',$operation)
        ->with('regions',$regions)
        ->with('customers',$customers);
    }

    public function update(Request $request, $id)
    {
        
        $this->validate($request, [
            'oid' => 'required',
            'customer' => 'required',
            'sdate' => 'required',
            'region' => 'required',
            'volume' => 'required',
            'ctype' => 'required',
            'tone' => 'required',
            'tariff' => 'required',
                     
            ]);
    
        $operation = Operation::find($id);
        $operation->operationid = $request->oid;
        $operation->customer_id = $request->customer;
        $operation->startdate = $request->sdate;
        $operation->region_id = $request->region;
        $operation->volume = $request->volume;
        $operation->cargotype = $request->ctype;
        $operation->km = $request->tone;
        $operation->tariff = $request->tariff;
        $operation->save();
        Session::flash('success', 'operation updated successfuly' );
        return redirect()->route('operation');
    }

   
    public function destroy($id)
    {
      
        $operation = Operation::find($id);
        $operation->status = 0;
        $operation->save();
        Session::flash('success', 'Operation deleted successfuly' );
        return redirect()->back();

    }
    public function close($id)
    {
        $operation = Operation::find($id);
        return view('operation.operation.close')->with('operation',$operation);

    }
    public function open($id)
    {
        $operation = Operation::find($id);
        $operation->closed = 1;
        $operation->save();
        Session::flash('success', 'Operation Opend successfuly' );
        return redirect()->back();

    }
    public function update2(Request $request, $id)
    {
        // dd($request->all());
        $this->validate($request, [
            'edate' => 'required',
            'remark' => '',
             ]);
    
        $operation = Operation::find($id);
   
        $operation->enddate = $request->edate;
        $operation->remark = $request->remark;
        $operation->closed = 0;
        $operation->save();
        Session::flash('success', 'operation updated successfuly' );
        return redirect()->route('operation');
    }
}
