<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function roomes(){

        return $this->hasMany(related:Room::class);
        
    }

    public function toolses(){
        return $this->hasManyThrough(related:Tool::class, through:Room::class);
    }
}
