<?php

namespace App\Http\Controllers;

use App\Models\Production;
use App\Models\Productname;
use Illuminate\Http\Request;
use App\Models\Productstore;
use PDF;

class ProductinputController extends Controller
{
    //



    function index(){
        if(request()->user()->hasAllPermissions(['product-input'])){
            $productnames = Productname::all();
            return view('productinput',compact('productnames'));
        }else{
            return "You have not any access";
        }


    }

    function store(Request $request){
        $productid = time();
        $productstore = new Productstore();
        $productstore->productID = $productid;
        $productstore->productname = $request->product;
        $productstore->size = $request->size;
        $productstore->weight = $request->weight;
        $productstore->save();

        $production = new Production();
        $production->weight = $request->weight;
        $production->save();

        // return back()->with('success','Product stored successfully!');
        $data = [
            'name'=> $request->product,
            'size'=>$request->size,
            'weight'=>$request->weight,
            'qrcode'=>$productid,
            'dateandtime'=>date("F j, Y, g:i a")
        ];
        $pdf = PDF::loadView('mypdf',$data)->setPaper([0,0,290,290], 'landscape');
        return $pdf->stream();
    }
}
