<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{
    use HasFactory;
    protected $guarded =[];
    
    public function room(){
        return $this->belongsTo(Room::class);       
    }

    public function toolUnit(){
        return $this->belongsTo(ToolUnit::class);
    }

    public function statuses(){
        return $this->belongsToMany(Status::class)->withPivot('tanggal','berita');
    }

    public function pictures() {
        return $this->hasMany(PictureTool::class);
    }
}
