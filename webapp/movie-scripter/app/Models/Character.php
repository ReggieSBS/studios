<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\CharacterTrait;

class Character extends Model
{
    use HasFactory, CharacterTrait;
    protected $table = "characters";

    public function ebooks(){
        return $this->belongsToOne(Ebook::class,'id','ebook_id');
    }
}
