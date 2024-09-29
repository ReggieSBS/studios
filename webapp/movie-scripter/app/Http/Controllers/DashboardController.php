<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Traits\InitialTrait;

class DashboardController extends Controller
{
    // use InitialTrait;
    
    public function dashboard(){
        $ebooks = User::with('ebooks')->get();
        $movies = User::with('movies')->get();
        return view("webapp.dashboard", ["ebooks"=>$ebooks, "movies"=>$movies]);
    }
}
