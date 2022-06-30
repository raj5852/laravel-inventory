<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CreatecustomerName extends Controller
{
    //
    function index(){
        if(request()->user()->hasAllPermissions(['create-name'])){
            $customers = Customer::orderBy('id','desc')->paginate(10);
            return view('createcustomer',compact('customers'));
        }
    }
    function post(Request $request){
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->address = $request->address;
        $customer->save();
        return back()->with('success','Success!');
    }
    function delete(Request $request){
        Customer::where('id',$request->id)->delete();
        return back();
    }
}
