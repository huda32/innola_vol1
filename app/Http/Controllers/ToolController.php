<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use App\Models\PictureTool;
use App\Models\Room;
use App\Models\Status;
use App\Models\Tool;
use App\Models\ToolUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ToolController extends Controller
{
    function index(){
    $alat = Tool::all();
    return view('tool.index',compact(['alat']));
    }

    public function create(){   
        $room = Room::all();
        $tool = Tool::all();
        $toolUnit = ToolUnit::all();  
        return view('tool.create',compact(['room','tool','toolUnit']));
    }

    public function store(Request $request){
       
        $request->validate([
            'room_id' => 'required',
            'tool_unit_id' => 'required',
            'merk_alat' => 'required',
            'id_mesin' => 'required',
            'fungsi' => 'required'
        ]);
           
        $image =  time().rand(1,200).'.png';

        $alat = Tool::create([
            'room_id' => $request->room_id,
            'tool_unit_id' => $request->tool_unit_id,
            'merk_alat' => $request->merk_alat,
            'id_mesin' => $request->id_mesin,
            'ip' => $request->ip,
            'fungsi' => $request->fungsi,
            'tanggal_mulai' => $request->tanggal_mulai,
            'code' => $image
        ]);

        $qrcode = QrCode::format('png')->size(300)->errorCorrection('H')->generate('http://127.0.0.1:8000/'.'tool/'.$alat->id);
        Storage::disk('public')->put($image, $qrcode);

        foreach ($request->file('image') as $file) {
            $filename = time().rand(1,200).'.'.$file->extension();
            // $file->move(public_path('alat'),$filename);
            Storage::disk('public')->put('alat/'.$filename, file_get_contents($file));
            PictureTool::create([
                'tool_id' => $alat->id,
                'filename' => $filename
            ]);
        }

        return redirect('/tool')->with('success','Data Computer Sudah Di Update');
    }
    public function updateStatus(Request $request){
        // dd($request->all());
        
        $tools = Tool::find($request->tool_id);
        $tools->statuses()->attach($request->status_id, ['berita' => $request->description , 'tanggal' => $request->tanggal]);
        return redirect('/tool'.'/'.$request->tool_id)->with('success','Status Komputer Berhasil Diubah');
        
    }

    public function show($id){
        $tools = Tool::find($id);
        $statuses = Status::all();
        $products = Tool::with('pictures')->find($id);
        $cek = $products->pictures;

       return view('tool.show',compact('tools','statuses','products','cek'));
    }

    
}
