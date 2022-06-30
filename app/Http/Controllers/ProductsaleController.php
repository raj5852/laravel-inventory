<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Delvery;
use Illuminate\Http\Request;
use App\Models\Productstore;

class ProductsaleController extends Controller
{
    //


    function index()
    {
        if(request()->user()->hasAllPermissions('product-output')){
            $customers = Customer::all();

            return view('sale', compact('customers'));
        }else{
            return 'You have no access';
        }


    }

    function ajax(Request $request)
    {
        $find =  Productstore::where('productid', $request->productname)->first();
        return response()->json($find);
    }
    function  sals(Request $request)
    {
        // Productstore::destroy();
        $findMany = Productstore::findMany($request->id);
        $totalProductWeight = $findMany->sum('weight');

        $delvery = new Delvery();
        $delvery->name = $request->customer;
        $delvery->weight = $totalProductWeight;
        $delvery->save();
        Productstore::destroy($request->id);
        return back()->with('success', 'Product delivered successfully!');
    }
}
