<?php

namespace App\Http\Controllers;

use App\Models\ViewAnggaranAll;
use App\Models\ViewAnggaranPerOPD;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $opd = ViewAnggaranPerOPD::all();

        $data = ViewAnggaranAll::all();

        return view('dashboards.base_layout',compact('data','opd'));
    }
}