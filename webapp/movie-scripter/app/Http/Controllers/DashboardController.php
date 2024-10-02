<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ebook;
use App\Http\Traits\InitialTrait;

class DashboardController extends Controller
{
    // use InitialTrait;
    
    public function dashboard(){
        // $ebooks = json_decode($ebooks);
        $ebookpages=[];
        $ebookchapters=[];
        $ebookcharacters=[];
        $movies = User::with('movies')->get();
        $ebooks = User::with('ebooks')->get();

        
        $ebookid = session()->get('ebookid');
        $ebookdata = Ebook::query();
        $ebookdata = $ebookdata->where('id', $ebookid)->first();


        // $ebooksdata = Ebook::ebooksData();

        // if(!empty($ebooksdata)){
        //     $ebookpages = $ebooksdata[0];
        // }
        // if(!empty($ebooksdata)){
        //     $ebookchapters = $ebooksdata[1];
        // }
        // if(!empty($ebooksdata)){
        //     $ebookcharacters = $ebooksdata[2];
        // }

        return view('webapp.dashboard', ['ebookpages' => $ebookpages, 'ebookchapters' => $ebookchapters, 'ebookcharacters' => $ebookcharacters, 'ebooks' => $ebooks]);
    }
}
