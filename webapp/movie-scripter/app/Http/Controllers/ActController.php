<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ebook;
use App\Models\Act;
use App\Models\Archetype;

class ActController extends Controller
{
    public function overview(){
        return view('webapp.acts', ['test'=>'test']);
    }
    public function read(Request $request){
        $ebookid = session()->get('ebookid');
        $ebookpages=[];
        $ebookchapters=[];
        $ebookcharacters=[];
        $totalebookpages = 0;
        $totalebookchapters = 0;

        $ebooks = User::with('ebooks')->get();
        $ebookdata = Ebook::query();
        $ebookdata = $ebookdata->where('id', $ebookid)->first();
        $ebooksdata = Ebook::ebooksData();

        if(session()->exists('ebookid')){
            $ebookpages = $ebooksdata[0];
            $ebookchapters = $ebooksdata[1];
            $ebookcharacters = $ebooksdata[2];
            $totalebookpages = $ebookpages->count();
            $totalebookchapters = $ebookchapters->count();
            $totalebookcharacters = $ebookcharacters->count();
        }

        $actscount = 0;
        $acts = null;
        if(session()->exists('movieid')){
            $movieid = session()->get('movieid');
            $acts = Act::query();
            $acts = $acts->where('movie_id', $movieid)->get();
            $actscount = $acts->count();
        }

        $actid = $request->id;
        $actdata = Act::query();
        $actdata = $actdata->where('id', $actid)->first();
        $archetypedata = Archetype::query();
        $archetypedata = $archetypedata->where('act_id', $actid)->first();
        
        return view('webapp.act', ['ebookdata' => $ebookdata, 'ebookpages' => $ebookpages, 'ebookchapters' => $ebookchapters, 'ebookcharacters' => $ebookcharacters, 'ebooks' => $ebooks, 'totalebookpages'=>$totalebookpages, 'totalebookchapters'=>$totalebookchapters, 'totalebookcharacters'=>$totalebookcharacters, 'actscount'=>$actscount, 'acts'=>$acts, 'actdata'=>$actdata, 'archetypedata'=>$archetypedata]);
    }
}
