<?php

namespace App\Http\Controllers;

use App\Models\Computer;
use App\Models\Plant;
use App\Models\Tool;
use App\Models\ToolUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\select;

class AssetController extends Controller
{
    public function show($id){
        $computer = Computer::find($id);
        // $tools = Tool::where('plant_id',$id);
        $tool = Tool::all()
        ->where('plant_id','=',$id);
        $ToolUnit = ToolUnit::all();
      
        // ->select('post_id', 'post_type', 'created_at', DB::raw('count(*) as total'))
        // ->groupBy('post_id', 'post_type')
        $plants = Plant::with(relations:'toolses')->get();

        return view('asset.show',compact('tool','ToolUnit','plants'));
    }
}
// foreach($tool as $alat){
        //     $total_num[] = Tool::all()->where('tool_unit_id','=', $alat('id'))->count();
        // }