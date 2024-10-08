<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Page extends Model
{
    use HasFactory;
    protected $table = "pages";

    public function ebooks(){
        return $this->belongsToOne(Ebook::class,'id','ebook_id');
    }
    
    public function characters(): HasMany
    {
        return $this->hasMany(pageCharacters::class);
    }
    
}
