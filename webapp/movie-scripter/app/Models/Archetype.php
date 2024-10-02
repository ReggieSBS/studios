<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archetype extends Model
{
    use HasFactory;
    protected $table = "archetypes";    

    public function ebooks(){
        return $this->belongsToOne(Ebook::class,'id','ebook_id');
    }
}
