<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasMany;

class Plot extends Model
{
    use HasFactory;
    protected $table = "plots";
    
    public function acts(){
        return $this->belongsToOne(Act::class,'id','act_id');
    }
    public function plotroles(): HasMany
    {
        return $this->hasMany(PlotRole::class);
    }
    public function actinglines(): HasMany
    {
        return $this->hasMany(ActingLines::class);
    }
}
