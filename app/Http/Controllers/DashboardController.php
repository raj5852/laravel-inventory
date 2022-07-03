<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\Delvery;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    //
    function index(Request $request)
    {
        $datas = Delvery::orderBy('id', 'desc')->paginate(10);

        return view('admin', compact('datas'))->with('i', (request()->input('page', 1) - 1) * 10);
    }
    function search(Request $request)
    {
        $start_date = Carbon::parse($request->startdate)
            ->toDateTimeString();

        $end_date = Carbon::parse($request->enddate)
            ->toDateTimeString();

        if ($request->startdate == '' && $request->enddate == '') {
            $datas =  Delvery::where('name', 'like', '%' . $request->name . '%')->get();
            return  view('search', compact('datas'))->with('i', (request()->input('page', 1) - 1) * 10);
        }

        $datas =  Delvery::where('name', 'like', '%' . $request->name . '%')->whereBetween('created_at', [
            $start_date, $end_date
        ])->get();



        return  view('search', compact('datas'))->with('i', (request()->input('page', 1) - 1) * 10);
    }
}
