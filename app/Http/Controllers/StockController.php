<?php

namespace App\Http\Controllers;

use App\Models\Delvery;
use App\Models\Production;
use App\Models\Productstore;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StockController extends Controller
{

    function index()
    {

        if (request()->user()->hasAllPermissions(['stock', 'create-product', 'create-name'])) {
            $stocks = Productstore::orderBy('id', 'desc')->paginate(10);

            $tatal = Productstore::sum('weight');
            $todayProduction = Production::whereDate('created_at', Carbon::now())->get();
            $todayProductionSum = $todayProduction->sum('weight');

            $deliverys = Delvery::whereDate('created_at', Carbon::now())->get();
            $todayDeliveryWeight =  $deliverys->sum('weight');

            $opting =  Productstore::whereDate('created_at', '!=', Carbon::now())->get()->sum('weight');

            return view('stock', compact('stocks', 'tatal', 'todayProductionSum', 'deliverys', 'todayDeliveryWeight', 'opting'))->with('i', (request()->input('page', 1) - 1) * 10);
        }
    }
}
