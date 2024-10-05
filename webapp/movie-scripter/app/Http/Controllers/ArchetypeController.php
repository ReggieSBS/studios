<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ebook;
use App\Models\Act;
use App\Models\Archetype;
use App\Models\ArchetypeActs;
use App\Models\Movie;

class ArchetypeController extends Controller
{
    public function overview(){
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

            $countmovies = 0;
            $moviedata = Movie::query();
            $moviedata = $moviedata->where('ebook_id', $ebookid)->first();
            $countmovies = $moviedata->where('ebook_id', $ebookid)->get()->count();

            return view('webapp.archetypes', ['ebookdata' => $ebookdata, 'ebookpages' => $ebookpages, 'ebookchapters' => $ebookchapters, 'ebookcharacters' => $ebookcharacters, 'ebooks' => $ebooks, 'totalebookpages'=>$totalebookpages, 'totalebookchapters'=>$totalebookchapters, 'totalebookcharacters'=>$totalebookcharacters, 'countmovies'=>$countmovies]);
        }
        else
        {
            return redirect(route('dashboard'))->with("success","Please select an e-book first");
        }
    }

    
    public function write(Request $request){
        $movieid = session()->get('movieid');

   
        
        $ebookid = session()->get('ebookid');

        $act = New Act();
        $act->act_number = $request->act_number;
        $act->title = $request->title;
        $act->development = $request->genre;
        $act->movie_id  = $movieid;
        if($act->save())
        {
            $archetype = New Archetype();
            $archetype->movie_id = $movieid;
            $archetype->closer_to_goal = $request->closer;
            $archetype->answer = $request->answer;
            if($archetype->save())
            {
                $archetypeact = New ArchetypeActs();
                $archetypeact->archetype_id = $archetype->id;
                $archetypeact->act_id = $act->id;
                if($archetypeact->save())
                {
                    return redirect(route('movie.archetypes'))->with("success","Archetype and act created");
                }
            }
        }
        
    }
}
