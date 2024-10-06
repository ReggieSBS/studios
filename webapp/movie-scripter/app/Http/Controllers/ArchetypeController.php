<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ebook;
use App\Models\Act;
use App\Models\Archetype;
use App\Models\ArchetypeActs;
use App\Models\Chapter;
use App\Models\Character;
use App\Models\Movie;

class ArchetypeController extends Controller
{
    public function overview(){
        $ebookid = session()->get('ebookid');
        $movieid = session()->get('movieid');
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

            $countmovies = 0;
            $movieloop = Movie::query();
            $movieloop = $movieloop->where('ebook_id', $ebookid)->get()->toArray();
            foreach($movieloop as $movie){ $countmovies++; }
            if($countmovies > 0)
            {
                $moviedata = Movie::where('ebook_id', $ebookid)->first();
                session()->put('movieid', $moviedata->id);
            }


            $archetypesdata = Archetype::select('archetypes.id', 'archetypes.archetype_name', 'archetypes.act_id', 'archetypes.movie_id', 'archetypes.character_id', 'acts.act_number', 'characters.name', 'characters.profile_image')->where('archetypes.movie_id', $movieid)->orderBy('act_id', 'asc')->leftJoin('acts', 'acts.id', '=', 'archetypes.act_id')->leftJoin('characters', 'characters.id', '=', 'archetypes.character_id')->get();

            $countarchetypes = $archetypesdata->count();

            $actscount = 0;
            $acts = null;
            if(session()->exists('movieid')){
                $movieid = session()->get('movieid');
                $acts = Act::where('movie_id', $movieid)->get();
                $actscount = $acts->count();
            }

            return view('webapp.archetypes', ['ebookdata' => $ebookdata, 'ebookpages' => $ebookpages, 'ebookchapters' => $ebookchapters, 'ebookcharacters' => $ebookcharacters, 'ebooks' => $ebooks, 'totalebookpages'=>$totalebookpages, 'totalebookchapters'=>$totalebookchapters, 'totalebookcharacters'=>$totalebookcharacters, 'countmovies'=>$countmovies, 'countarchetypes'=>$countarchetypes, 'archetypesdata'=>$archetypesdata, 'actscount'=>$actscount, 'acts'=>$acts]);
        }
        else
        {
            return redirect(route('dashboard'))->with("success","Please select an e-book first");
        }
    }



    public function read(Request $request){
        $ebookid = session()->get('ebookid');
        $movieid = session()->get('movieid');
        $archetypeid = $request->id;
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
            $movieloop = Movie::where('ebook_id', $ebookid)->get()->toArray();
            foreach($movieloop as $movie){ $countmovies++; }
            if($countmovies > 0)
            {
                $moviedata = Movie::where('ebook_id', $ebookid)->first();
                session()->put('movieid', $moviedata->id);
            }

            $archetypesdata = Archetype::select('archetypes.id', 'archetypes.archetype_name', 'archetypes.act_id', 'archetypes.movie_id', 'archetypes.character_id', 'acts.act_number', 'archetypes.closer_to_goal', 'archetypes.answer', 'acts.id', 'acts.title', 'characters.name', 'characters.profile_image')->where('archetypes.id', $archetypeid)->orderBy('act_id', 'asc')->leftJoin('acts', 'acts.id', '=', 'archetypes.act_id')->leftJoin('characters', 'characters.id', '=', 'archetypes.character_id')->first();

            $actchapters = Chapter::where('archetype_id',$archetypesdata->id)->get();
            $actchapterstotal = $actchapters->count();


            $actscount = 0;
            $acts = null;
            if(session()->exists('movieid')){
                $movieid = session()->get('movieid');
                $acts = Act::where('movie_id', $movieid)->get();
                $actscount = $acts->count();
            }
            return view('webapp.archetype', ['ebookdata' => $ebookdata, 'ebookpages' => $ebookpages, 'ebookchapters' => $ebookchapters, 'ebookcharacters' => $ebookcharacters, 'ebooks' => $ebooks, 'totalebookpages'=>$totalebookpages, 'totalebookchapters'=>$totalebookchapters, 'totalebookcharacters'=>$totalebookcharacters, 'countmovies'=>$countmovies, 'archetypesdata'=>$archetypesdata, 'actscount'=>$actscount, 'acts'=>$acts, 'actchapters'=>$actchapters, 'actchapterstotal'=>$actchapterstotal]);
        }
        else
        {
            return redirect(route('dashboard'))->with("success","Please select an e-book first");
        }
    }

    
    public function write(Request $request){
        $movieid = session()->get('movieid');
        $ebookid = session()->get('ebookid');
        $maincharacterdata = Character::where('ebook_id', $ebookid)->where('main_character', 1)->first();
   

        $act = New Act();
        $act->act_number = $request->act_number;
        $act->title = $request->title;
        $act->development = $request->genre;
        $act->movie_id  = $movieid;
        if($act->save())
        {
            $archetype = New Archetype();
            $archetype->movie_id = $movieid;
            $archetype->character_id = $maincharacterdata->id;
            $archetype->act_id = $act->id;
            $archetype->archetype_name = $request->archetype;
            $archetype->answer = $request->answer;
            if($archetype->save())
            {
                return redirect(route('movie.archetypes'))->with("success","Archetype and act created");
            }
        }
        
    }


    public function chapter(Request $request){

        $archetype_id = $request->archetype_id;

        Chapter::where('archetype_id', $archetype_id)->update((['archetype_id'=>'0']));

        if($request->chapter!=null)
        {
            foreach($request->chapter as $chapter)
            {
                $chapter = Chapter::find($chapter);
                $chapter->archetype_id = $archetype_id;
                $chapter->save();
            }
        }

        return redirect('/archetype/'.$archetype_id);
    }



    
    public function update(Request $request){
        $movieid = session()->get('movieid');
        $ebookid = session()->get('ebookid');
        $maincharacterdata = Character::where('ebook_id', $ebookid)->where('main_character', 1)->first();
   
        $act_id = $request->act_id;
        $archetype_id = $request->archetype_id;

        if($request->closer_to_goal)
        {
            $closer_to_goal = 1;
        }
        else
        {
            $closer_to_goal = 0;
        }

        $act = Act::find($act_id);
        $act->act_number = $request->act_number;
        if($act->save())
        {
            $archetype = Archetype::find($archetype_id);
            $archetype->archetype_name = $request->archetype;
            $archetype->closer_to_goal = $closer_to_goal;
            $archetype->answer = $request->answer;
            if($archetype->save())
            {
                return redirect(route('movie.archetypes'))->with("success","Archetype and act created");
            }
        }
        
    }

}
