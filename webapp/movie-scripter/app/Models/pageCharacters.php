<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pageCharacters extends Model
{
    use HasFactory;

    
    public function chapters(){
        return $this->belongsToOne(Page::class,'id','page_id');
    }
}
