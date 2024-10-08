<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasOne;
use Illuminate\Database\Eloquent\Relations\hasMany;
use App\Http\Traits\EbookTrait;

class Ebook extends Model
{
    use HasFactory, EbookTrait;
    protected $table = "ebooks";

    public function pages(): HasMany
    {
        return $this->hasMany(Page::class);
    }
    
    public function chapters(): HasMany
    {
        return $this->hasMany(Chapter::class);
    }
    
    public function characters(): HasMany
    {
        return $this->hasMany(Character::class);
    }

    public function users(){
        return $this->belongsToOne(User::class,'id','user_id');
    }

}
