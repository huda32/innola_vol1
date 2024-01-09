<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Computer extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function user(){
        return $this->belongsTo(Userp5::class);       
    }
    public function computer(){
        return $this->belongsTo(ComputerUnit::class);       
    }
    public function monitor(){
        return $this->belongsTo(Monitor::class);       
    }
    public function accesoris(){
        return $this->belongsTo(Accesoris::class);       
    }
    public function mouse(){
        return $this->belongsTo(Mous::class);       
    }
    public function keyboard(){
        return $this->belongsTo(Keyboard::class);       
    }

    public function statuses(){
        return $this->belongsToMany(Status::class)->withPivot('tanggal','berita');
    }

    public function pictures() {
        return $this->hasMany(PictureTool::class);
    }

}
