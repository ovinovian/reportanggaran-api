<?php

namespace App\Http\Controllers;

use App\Models\ViewAnggaranAll;
use App\Models\ViewAnggaranPerOPD;
use App\Models\ViewAnggaranPerSubKegiatan;
use App\Models\ViewAnggaranPerSubOPD;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $opd = ViewAnggaranPerOPD::all();

        $data = ViewAnggaranAll::all();

        return view('dashboards.layouts.dashboard',compact('data','opd'));
    }

    public function detil_peropd()
    {
        $opd = ViewAnggaranPerOPD::all();

        $data = ViewAnggaranAll::all();
        
        $i = 0;

        return view('dashboards.layouts.dashboard-peropd',compact('data','opd','i'));
    }

    public function detil_persubopd($kode_opd)
    {
        $opd = ViewAnggaranPerSubOPD::where('kode_opd',$kode_opd)->get();

        $data = ViewAnggaranPerOPD::where('kode_opd',$kode_opd)->get();

        $i = 0;
        
        return view('dashboards.layouts.dashboard-persubopd',compact('data','opd','i'));
    }

    public function detil_persubkegiatan($kode_subopd)
    {
        $opd = ViewAnggaranPerSubKegiatan::where('kode_sub_unit',$kode_subopd)->get();

        $data = ViewAnggaranPerSubOPD::where('kode_sub_unit',$kode_subopd)->get();

        $i = 0;
        
        return view('dashboards.layouts.dashboard-persubkegiatan',compact('data','opd','i'));
    }

    public function dashboard()
    {
        $opd = ViewAnggaranPerOPD::all();

        $data = ViewAnggaranAll::all();

        return view('dashboard',compact('data','opd'));
    }

    public function dashboard_detil_peropd()
    {
        $opd = ViewAnggaranPerOPD::all();

        $data = ViewAnggaranAll::all();
        
        $i = 0;

        return view('dashboard-peropd',compact('data','opd','i'));
    }

    public function dashboard_detil_persubopd($kode_opd)
    {
        $opd = ViewAnggaranPerSubOPD::where('kode_opd',$kode_opd)->get();

        $data = ViewAnggaranPerOPD::where('kode_opd',$kode_opd)->get();

        $i = 0;
        
        return view('dashboard-persubopd',compact('data','opd','i'));
    }

    public function dashboard_detil_persubkegiatan($kode_subopd)
    {
        $opd = ViewAnggaranPerSubKegiatan::where('kode_sub_unit',$kode_subopd)->get();

        $data = ViewAnggaranPerSubOPD::where('kode_sub_unit',$kode_subopd)->get();

        $i = 0;
        
        return view('dashboard-persubkegiatan',compact('data','opd','i'));
    }
}