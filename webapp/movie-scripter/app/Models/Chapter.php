<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasMany;

class Chapter extends Model
{
    use HasFactory;
    protected $table = "chapters";
    

    public function ebooks(){
        return $this->belongsToOne(Ebook::class,'id','ebook_id');
    }

    public function characters(): HasMany
    {
        return $this->hasMany(chapterCharacters::class);
    }
}
