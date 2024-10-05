<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Ebook;
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
        return view('webapp.questions', ['ebookdata' => $ebookdata, 'ebookpages' => $ebookpages, 'ebookchapters' => $ebookchapters, 'ebookcharacters' => $ebookcharacters, 'ebooks' => $ebooks, 'totalebookpages'=>$totalebookpages, 'totalebookchapters'=>$totalebookchapters, 'totalebookcharacters'=>$totalebookcharacters]);
    }
    public function formula(){
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
            $movieloop = Movie::query();
            $movieloop = $movieloop->where('ebook_id', $ebookid)->get()->toArray();
            foreach($movieloop as $movie){ $countmovies++; }
            if($countmovies > 0)
            {
                $movieloop = Movie::query();
                $moviedata = $movieloop->where('ebook_id', $ebookid)->first();
                session()->put('movieid', $moviedata->id);
            }

            return view('webapp.formula', ['ebookdata' => $ebookdata, 'ebookpages' => $ebookpages, 'ebookchapters' => $ebookchapters, 'ebookcharacters' => $ebookcharacters, 'ebooks' => $ebooks, 'totalebookpages'=>$totalebookpages, 'totalebookchapters'=>$totalebookchapters, 'totalebookcharacters'=>$totalebookcharacters, 'countmovies'=>$countmovies]);
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
}
