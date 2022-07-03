<?php

namespace App\Http\Controllers;

use App\Models\Deliveryreport;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    //
    function index(Request $request)
    {
        $id = $request->id;
        $datas =  Deliveryreport::where('delverie_id', $id)->get();
        return view('view', compact('datas'))->with('i', (request()->input('page', 1) - 1) * 10);
    }
}
