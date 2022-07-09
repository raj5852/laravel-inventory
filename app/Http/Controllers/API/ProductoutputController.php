<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Productstore;
use App\Models\Deliveryreport;
use App\Models\Delvery;


class ProductoutputController extends Controller
{
    //
    function  index(Request $request)
    {
        if (request()->user()->hasAllPermissions('product-output')) {

            return response()->json(['status' => 'product-output']);
        } else {
            return response()->json(['status' => 'You have no access']);
        }
    }
    function customername()
    {


        return response()->json(['data' => Customer::all()]);
    }

    function ajax(Request $request)
    {

        $find =  Productstore::where('productid', $request->qrcodeid)->first();
        if ($find) {
            return response()->json(['data' => $find]);
        } else {
            return response()->json(['data' => 'No data found']);
        }
    }

    function  sals(Request $request)
    {

        if (empty($request->id)) {
            return 'No Data Found';
        } else {

            $customername = Customer::find($request->customerid);


            $findMany = Productstore::findMany($request->id);
            $totalProductWeight = $findMany->sum('weight');

            $delvery = new Delvery();
            $delvery->name = $customername->name;
            $delvery->weight = $totalProductWeight;
            $delvery->save();

            // $productname = $data->productname;
            // $weight = $data->weight;
            foreach ($findMany as $data) {
                Deliveryreport::create([
                    'delverie_id' => $delvery->id,
                    'productname' => $data->productname,
                    'weigth' => $data->weight,
                    'size' => $data->size
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
            return response()->json(['data' => $data]);
        }
    }
}
