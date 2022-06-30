<?php

namespace App\Http\Controllers;

use App\Models\Productname;
use Illuminate\Http\Request;

class ProductcreateController extends Controller
{
    //
    function  index(){
        if(request()->user()->hasAllPermissions(['create-product'])){
            $productnames = Productname::orderBy('id','desc')->paginate(10);
            return view('createproduct',compact('productnames'));
        }

    }
    function post(Request $request){
        $productname =new  Productname();
        $productname->name = $request->name;
        $productname->save();
        return back()->with('success','Success!');
    }
    function pds(Request $request){
         Productname::where('id',$request->id)->delete();
        return back();
    }
}
