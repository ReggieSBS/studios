<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Traits\InitialTrait;

class DashboardController extends Controller
{
    // use InitialTrait;
    
    public function dashboard(){
        // $ebooks = json_decode($ebooks);
        $movies = User::with('movies')->get();
        $ebooks = User::with('ebooks')->get();
        return view("webapp.dashboard", compact('ebooks'));
    }
}
