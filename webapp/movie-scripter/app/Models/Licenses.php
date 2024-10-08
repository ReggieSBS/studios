<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Licenses extends Model
{
    use HasFactory;
    protected $table = "licences";
    
    public function license(){
        return $this->belongsToOne(License::class,'id','licence_id');
    }
}
