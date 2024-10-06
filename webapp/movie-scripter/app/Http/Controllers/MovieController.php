<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Ebook;
use App\Models\Act;
use App\Models\Movie;

class MovieController extends Controller
{
    public function overview(){
        $ebookid = session()->get('ebookid');
        $ebookpages=[];
        $ebookchapters=[];
        $ebookcharacters=[];
        $totalebookpages = 0;
        $totalebookchapters = 0;

        $ebooks = User::with('ebooks')->get();
        $ebookdata = Ebook::where('id', $ebookid)->first();
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
            $acts = Act::where('movie_id', $movieid)->get();
            $actscount = $acts->count();
        }

        return view('webapp.questions', ['ebookdata' => $ebookdata, 'ebookpages' => $ebookpages, 'ebookchapters' => $ebookchapters, 'ebookcharacters' => $ebookcharacters, 'ebooks' => $ebooks, 'totalebookpages'=>$totalebookpages, 'totalebookchapters'=>$totalebookchapters, 'totalebookcharacters'=>$totalebookcharacters]);
    }

    public function formula(){
        $ebookid = session()->get('ebookid');
        $ebookpages=[];
        $ebookchapters=[];
        $ebookcharacters=[];
        $totalebookpages = 0;
        $totalebookchapters = 0;
        $moviedata = null;

        $ebooks = User::with('ebooks')->get();
        $ebookdata = Ebook::where('id', $ebookid)->first();
        $ebooksdata = Ebook::ebooksData();

        if(session()->exists('ebookid')){
            $ebookpages = $ebooksdata[0];
            $ebookchapters = $ebooksdata[1];
            $ebookcharacters = $ebooksdata[2];
            $totalebookpages = $ebookpages->count();
            $totalebookchapters = $ebookchapters->count();
            $totalebookcharacters = $ebookcharacters->count();
            $countmovies = 0;
            $movieloop = Movie::query();
            $movieloop = $movieloop->where('ebook_id', $ebookid)->get()->toArray();
            foreach($movieloop as $movie){ $countmovies++; }

            $actscount = 0;
            $actdata = null;
            $actscount = 0;
            $acts = null;
            if($countmovies > 0)
            {
                $moviedata = Movie::where('ebook_id', $ebookid)->first();
                session()->put('movieid', $moviedata->id);

                $acts = Act::where('movie_id', $moviedata->id)->get();
                $actscount = $acts->count();

                $actdata = Act::select('acts.id', 'acts.movie_id', 'acts.act_number', 'acts.title', 'acts.description', 'archetypes.act_id', 'archetypes.archetype_name', 'archetypes.id as archetypeid')->where('acts.movie_id', $moviedata->id)->leftJoin('archetypes', 'archetypes.act_id', '=', 'acts.id')->get();

                $actscount = $actdata->count();
            }


            return view('webapp.formula', ['ebookdata' => $ebookdata, 'ebookpages' => $ebookpages, 'ebookchapters' => $ebookchapters, 'ebookcharacters' => $ebookcharacters, 'ebooks' => $ebooks, 'totalebookpages'=>$totalebookpages, 'totalebookchapters'=>$totalebookchapters, 'totalebookcharacters'=>$totalebookcharacters, 'countmovies'=>$countmovies, 'actscount'=>$actscount, 'actdata'=>$actdata, 'moviedata'=>$moviedata, 'actscount'=>$actscount, 'acts'=>$acts]);
        }
        else
        {
            return redirect(route('dashboard'))->with("success","Please select an e-book first");
        }
    }
    
    public function write(Request $request){
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'genre' => ['required', 'string']
        ]);
        
        $ebookid = session()->get('ebookid');
        $movie = New Movie();
        $movie->name = $request->title;
        $movie->genre = $request->genre;
        $movie->ebook_id = $ebookid;
        $movie->user_id = Auth::user()->id;
        $movie->save();
        $movieid = $request->id;        
        session()->put('movieid', $movieid);
        return redirect(route('movie.formula'))->with("success","Movie has been created");
    }


    
    public function update(Request $request){
        $movieid = session()->get('movieid');
        $ebookid = session()->get('ebookid');

        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'genre' => ['required', 'string']
        ]);
        
        $movie = Movie::find($movieid);
        $movie->name = $request->title;
        $movie->genre = $request->genre;
        $movie->formula = $request->formula;
        $movie->save();
        $movieid = $request->id;        
        session()->put('movieid', $movieid);
        return redirect(route('movie.formula'))->with("success","Movie has been created");
    }
}
