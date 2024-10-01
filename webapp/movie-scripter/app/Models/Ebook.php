<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ebook extends Model
{
    use HasFactory;
    protected $table = "ebooks";

    public function users(){
        return $this->belongsToOne(User::class,'id','user_id');
    }
}
