<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\hasMany;

class Movie extends Model
{
    use HasFactory;
    protected $table = "movies";
    
    public function archetypes(): HasMany
    {
        return $this->hasMany(Archetype::class);
    }
    
    public function acts(): HasMany
    {
        return $this->hasMany(Act::class);
    }

    public function user(): HasOne{
        return $this->hasOne(User::class);
    }

    public function ebook(): HasOne{
        return $this->hasOne(Ebook::class);
    }

    public function ebooks(){
        return $this->belongsToOne(Ebook::class,'id','ebook_id');
    }
    
    public function users(){
        return $this->belongsToOne(User::class,'id','user_id');
    }
}
