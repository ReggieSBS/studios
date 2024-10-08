<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActingLines extends Model
{
    use HasFactory;
    protected $table = "acting_lines";

    public function plots(){
        return $this->belongsToOne(Plot::class,'id','plot_id');
    }
}
