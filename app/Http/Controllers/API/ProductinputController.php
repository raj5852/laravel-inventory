<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Productname;
use  App\Models\Productstore;
use App\Models\Production;
use Illuminate\Support\Facades\Validator;

class ProductinputController extends Controller
{

    function index(Request $request)
    {


        // return response()->json(['data' => Productname::all()]);



        $validator = Validator::make($request->json()->all(), [
            'productname' => 'required',
            'size' => 'required',
            'weight' => 'required'
        ]);


        $productid = time();
        $productstore = new Productstore();
        $productstore->productID = $productid;
        $productstore->productname = $request->productname;
        $productstore->size = $request->size;
        $productstore->weight = $request->weight;
        $productstore->save();

        $production = new Production();
        $production->weight = $request->weight;
        $production->save();

        // return back()->with('success','Product stored successfully!');
        $data = [
            'name' => $request->productname,
            'size' => $request->size,
            'weight' => $request->weight,
            'qrcode' => $productid,
            'dateandtime' => date("F j, Y, g:i a")
        ];
        return response()->json(['data' => $data]);
    }


    public function producctsnames()
    {

        return response()->json(['data' => Productname::select('id','name',)->get()]);
    }
}
