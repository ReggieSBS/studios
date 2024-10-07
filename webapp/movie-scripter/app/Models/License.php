<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class License extends Model
{
    use HasFactory;
    protected $table = "user_subscriptions";
    
    public function license(){
        return $this->belongsToOne(License::class,'id','licence_id');
    }
}
