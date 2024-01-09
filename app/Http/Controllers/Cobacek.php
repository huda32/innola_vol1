<?php

namespace App\Http\Controllers;

use App\Models\ComputerUnit;
use App\Models\keyboard;
use App\Models\Monitor;
use App\Models\Mous;
use App\Models\Mouse;
use App\Models\Picture;
use App\Models\PictureComputer;
use App\Models\PictureTool;
use App\Models\Room;
use App\Models\Status;
use App\Models\ToolUnit;
use App\Models\Userp5;
use Illuminate\Http\Request;

class Cobacek extends Controller
{
    function index()
    {
        $komputers = Keyboard::all();
        $mouse = PictureComputer::all();
        dd($mouse);
        return view('computer.index',compact(['komputers']));
    }
}
