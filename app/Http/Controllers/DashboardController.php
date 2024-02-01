<?php

namespace App\Http\Controllers;

use App\Models\Computer;
use App\Models\Plant;
use App\Models\Tool;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index(){
        $plant = Plant::all();
        return view('dashboard.index',compact(['plant']));
    }

    public function asset(){
        $computer = Computer::all()->count();
        $tool = Tool::all()->count();
        return view('dashboard.asset',compact(['computer', 'tool']));
    }

    public function assetGA(){
        return view('dashboard.assetGA');
    }

    public function assetProduksi(){
        return view('dashboard.assetProduksi');
    }
}
