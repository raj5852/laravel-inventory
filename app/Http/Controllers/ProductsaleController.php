<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Deliveryreport;
use App\Models\Delvery;
use Illuminate\Http\Request;
use App\Models\Productstore;
use GuzzleHttp\Promise\Create;
use PDF;

class ProductsaleController extends Controller
{
    //


    function index()
    {
        if (request()->user()->hasAllPermissions('product-output')) {
            $customers = Customer::all();
            return view('sale', compact('customers'));
        } else {
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
        if (empty($request->id)) {
            return 'No Data Found';
        } else {
            // Productstore::destroy();
            $customername = Customer::find($request->customerid);


            $findMany = Productstore::findMany($request->id);
            $totalProductWeight = $findMany->sum('weight');

            $delvery = new Delvery();
            $delvery->name = $customername->name;
            $delvery->weight = $totalProductWeight;
            $delvery->save();

            // $productname = $data->productname;
            // $weight = $data->weight;
            foreach($findMany as $data){
                Deliveryreport::create([
                    'delverie_id'=> $delvery->id,
                    'productname'=>$data->productname,
                    'weigth'=>$data->weight,
                    'size'=>$data->size
                ]);
            }
            //  return $findMany;


            Productstore::destroy($request->id);
            // return back()->with('success', 'Product delivered successfully!');
            $data = [
                'name' => $customername->name,
                'address' => $customername->address,
                'products' => $findMany,
                'total' => $totalProductWeight,
                'dateandtime' => date("F j, Y, g:i a")

            ];
            $pdf = PDF::loadView('invoice', $data)->setPaper([0, 0, 590, 290], 'landscape');
            return $pdf->stream();
        }
    }
}
