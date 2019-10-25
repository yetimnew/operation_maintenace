<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'clearance'])->except('index', 'show');
    }
    
    public function index()
    {
        $customers = Customer::active()->get();
        return view('operation.customer.index',compact('customers'));
    }

    public function create()
    {
        $customer = new Customer;
     return view('operation.customer.create')->with('customer',$customer);
    }

    public function store(Request $request)
    {
      $data = request()->validate([
        'name' => 'required|unique:customers,name', 
        'address' => 'required',
        'officenumber' => 'required',
        'mobile' => 'required',
        'remark' => 'required',

    ]);

       Customer::create($data);
    
        Session::flash('success', 'customer  registerd successfuly' );
        return redirect()->route('customer');
    }

    public function edit(Customer $id)
    {
        // $customer = Customer::find($id);
        return view('operation.customer.edit')
        ->with('customer',$customer);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'type' => 'required'
            
            ]);
            $customer = Customer::find($id);
            $customer->name = $request->type;
            $customer->address = $request->prodate;
            $customer->officenumber = $request->producer;
            $customer->mobile = $request->mob;
            $customer->remark = $request->remark;
            $customer->save();
            Session::flash('success', 'customer updated successfuly' );
            return redirect()->route('customer');
    }

   
    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->status = 0;
        $customer->save();
        Session::flash('success', 'Customer deleted successfuly' );
        return redirect()->back();

    }
}
