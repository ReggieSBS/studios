<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Act;
use App\Models\Ebook;
use App\Http\Traits\InitialTrait;

class DashboardController extends Controller
{
    // use InitialTrait;
    
    public function dashboard(){
        // $ebooks = json_decode($ebooks);
        $movies = User::with('movies')->get();
        $ebooks = User::with('ebooks')->get();
  
        $ebookpages=[];
        $ebookchapters=[];
        $ebookcharacters=[];
        
        $ebookid = session()->get('ebookid');
        $ebookdata = Ebook::query();
        $ebookdata = $ebookdata->where('id', $ebookid)->first();

        $ebooksdata = Ebook::ebooksData();
        
        if(session()->exists('ebookid'))
        {
            $ebooksdata = Ebook::ebooksData();
            $ebookpages = $ebooksdata[0];
            $ebookchapters = $ebooksdata[1];
            $ebookcharacters = $ebooksdata[2];
        }

        $actscount = 0;
        $acts = null;
        if(session()->exists('movieid')){
            $movieid = session()->get('movieid');
            $acts = Act::query();
            $acts = $acts->where('movie_id', $movieid)->get();
            $actscount = $acts->count();
        }

        return view('webapp.dashboard', ['ebookpages' => $ebookpages, 'ebookchapters' => $ebookchapters, 'ebookcharacters' => $ebookcharacters, 'ebooks' => $ebooks, 'ebookdata'=>$ebookdata, 'actscount'=>$actscount, 'acts'=>$acts]);
    }
}
