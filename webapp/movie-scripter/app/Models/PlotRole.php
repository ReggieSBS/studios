<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlotRole extends Model
{
    use HasFactory;
    protected $table = "plot_roles";

    
    public function plots(){
        return $this->belongsToOne(Plot::class,'id','plot_id');
    }
}
