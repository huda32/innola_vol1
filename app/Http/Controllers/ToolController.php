<?php

namespace App\Http\Controllers;


use App\Models\PictureTool;
use App\Models\Plant;
use App\Models\Room;
use App\Models\Status;
use App\Models\Tool;
use App\Models\ToolUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Js;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ToolController extends Controller
{
    function index(){
    $alat = Tool::all();
    $room = Room::all();
    return view('tool.index',compact(['alat']));
    }

    public function create(){   
        $plants = Plant::all()->pluck("name","id");
        $tool = Tool::all();
        $toolUnit = ToolUnit::all();  
        return view('tool.create',compact(['plants','tool','toolUnit']));
    }

    public function getRoom(Request $request){
        $room = Room::all()->where("plant_id", $request->plant_id)
        ->pluck("room","id");
        return response()->json($room);
    }

    public function store(Request $request){
      
        $request->validate([
            'plant' => 'required',
            'room' => 'required',
            'tool_unit_id' => 'required',
            'merk_alat' => 'required',
            'id_mesin' => 'required',
            'fungsi' => 'required'
        ]);
           
        $image =  time().rand(1,200).'.png';

        $alat = Tool::create([
            'plant_id' => $request->plant,
            'room_id' => $request->room,
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
            Storage::disk('public')->put('alat/'.$filename, file_get_contents($file));
            PictureTool::create([
                'tool_id' => $alat->id,
                'filename' => $filename
            ]);
        }
        return redirect('/tool')->with('success','Data Computer Sudah Di Update');

    }
    
    public function updateStatus(Request $request){ 
        $tools = Tool::find($request->tool_id);
        $tools->statuses()->attach($request->status_id, ['berita' => $request->description , 'tanggal' => $request->tanggal]);
        return redirect('/tool'.'/'.$request->tool_id)->with('success','Status Komputer Berhasil Diubah');  
    }

    public function updateRoom(Request $request){ 
        // dd($request->all());
        $tools = Tool::find($request->tool_id);
        $tools->update([
            'plant_id' =>  $request->plant, 
            'room_id' =>  $request->room, 
        ]);
        return redirect('/tool'.'/'.'edit'.'/'.$request->tool_id)->with('success','Alamat Ruangan Berhasil Diubah');  
    }

    public function storeImage(Request $request){
        // dd($request->all());
        $request->validate([
            'image' => 'required',         
        ]);

        foreach ($request->file('image') as $file) {
            $filename = time().rand(1,200).'.'.$file->extension();
            Storage::disk('public')->put('alat/'.$filename, file_get_contents($file));
            PictureTool::create([
                'tool_id' => $request->tool_id,
                'filename' => $filename
            ]);
        }
        return redirect('/tool'.'/'.$request->tool_id)->with('success','Image Berhasil Diubah');
    }

    public function show($id){
        $tools = Tool::find($id);
        $statuses = Status::all();
        $products = Tool::with('pictures')->find($id);
        $cek = $products->pictures;

       return view('tool.show',compact('tools','statuses','products','cek'));
    }

    public function  edit($id){
        $tool = Tool::find($id);
        $plants = Plant::all()->pluck("name","id");
        $toolUnit = ToolUnit::all();          
        return view('tool.update', compact('tool','plants','toolUnit'));
    }

    public function qrcodeRefresh($id){
        $tool = Tool::find($id);
        $imageDel = $tool->code;
        Storage::disk('public')->delete($imageDel);
        $image =  time().rand(1,200).'.png';
        $tool->update([
            'id' => $id,
            'code' => $image
        ]);
        $qrcode = QrCode::format('png')->size(300)->errorCorrection('H')->generate('http://127.0.0.1:8000/'.'computer.show/'.$id);
        Storage::disk('public')->put($image, $qrcode);
        return redirect('/tool'.'/'.$id)->with('success','Barcode Sudah direfresh');
    }

    public function imageDelete($id){
        $tool = Tool::find($id);
        $image = Tool::with('pictures')->find($id);
        $images = $image->pictures;
        return view('tool.imageDelete',compact(['tool','image','images']));
        
    }

    public function destroyImageTool($id, $idImage){
        $picture = PictureTool::find($idImage);
        $gambar = $picture->filename;
        $picture->delete();
        Storage::disk('public')->delete('alat/'.$gambar);
        return redirect('/tool'.'/'.'imageDelete/'.$id)->with('success','Gambar Sudah Dihapus');
    }

    // public function destroyImageComputer($id, $idImage){
    //     $picture = PictureComputer::find($idImage);
    //     $gambar = $picture->filename;
    //     $picture->delete();
    //     Storage::disk('public')->delete('komputer/'.$gambar);
    //     return redirect('/computer'.'/'.'imageEdit/'.$id)->with('success','Gambar Sudah Dihapus');
    // }
}
