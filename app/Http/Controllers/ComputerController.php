<?php

namespace App\Http\Controllers;

use App\Models\Accesoris;
use App\Models\Computer;
use App\Models\ComputerUnit;
use App\Models\keyboard;
use App\Models\Monitor;
use App\Models\Mous;
use App\Models\PictureComputer;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ComputerController extends Controller
{
    
    function index()
    {
        $komputers = Computer::all();
        $statuses = Status::all();
        return view('computer.index',compact(['komputers','statuses']));
    }

    public function create(){
        
        $komputer = ComputerUnit::all();
        $user = User::all();
        $monitor = Monitor::all();
        $mouse = Mous::all();
        $keyboard = keyboard::all();  
        return view('computer.create',compact(['komputer','user','monitor','mouse','keyboard']));
    }



    public function store(Request $request){
        // dd($request->all());
        $request->validate([
            'user_id' => 'required',
            'computer_id' => 'required',
            'monitor_id' => 'required',
            'mouse_id' => 'required',
            'proci' => 'required'
        ]);
           
    $image =  time().rand(1,200).'.png';     
      $kom = Computer::create([
            'user_id' => $request->user_id,
            'computer_id' => $request->computer_id,
            'monitor_id' => $request->monitor_id,
            'keyboard_id' => $request->keyboard_id,
            'mouse_id' => $request->mouse_id,
            'proci' => $request->proci,
            'memory' => $request->memory,
            'tambahan' => $request->tambahan,
            'ram' => $request->ram,
            'iplocal' => $request->iplocal,
            'ipvpn' => $request->ipvpn,
            'tanggal_mulai' => $request->tanggal_mulai,
            'code' => $image
        ]);

        $qrcode = QrCode::format('png')->size(300)->errorCorrection('H')->generate('http://127.0.0.1:8000/'.'computer.show/'.$kom->id);
        Storage::disk('public')->put($image, $qrcode);

        foreach ($request->file('image') as $file) {
            $filename = time().rand(1,200).'.'.$file->extension();
            Storage::disk('public')->put('komputer/'.$filename, file_get_contents($file));
            PictureComputer::create([
                'computer_id' => $kom->id,
                'filename' => $filename
            ]);
        }

        return redirect('/computer')->with('success','Data Computer Sudah Di Update');
    }

    public function updateStatus(Request $request){
        $komputer = Computer::find($request->computer_id);
        $komputer->statuses()->attach($request->status_id, ['berita' => $request->description , 'tanggal' => $request->tanggal]);
        return redirect('/computer')->with('success','Status Komputer Berhasil Diubah');
    }

    public function show($id){
        $komputer = Computer::find($id);
        $statuses = Status::all();
        // $products = Computer::with('pictures')->find($id);
       return view('computer.show',compact('komputer','statuses'));
    }

    public function qrcode($id){
        $komputer = Computer::find($id);
        return response()->download('storage/'.$komputer->code);
    }

    public function destroy($id, Request $request){
        
        $komputer = Computer::find($id);
        $image = $request->code;
        Storage::disk('public')->delete($image);
        $komputer->delete();
        return redirect('/computer')->with('success','Data Komputer Berhasil Dihapus');
    }

}
