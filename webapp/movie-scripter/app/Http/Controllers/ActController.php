<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ebook;
use App\Models\PlotRole;
use App\Models\Plot;
use App\Models\Act;
use App\Models\ActingLines;
use App\Models\Archetype;
use App\Models\Character;

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

        $actid = $request->id;
        $actdata = Act::where('id', $actid)->first();
        $plotsdata = Plot::with('plotroles')->where('act_id', $actid)->get();

        $archetypedata = Archetype::where('act_id', $actid)->first();
        
        return view('webapp.act', ['ebookdata' => $ebookdata, 'ebookpages' => $ebookpages, 'ebookchapters' => $ebookchapters, 'ebookcharacters' => $ebookcharacters, 'ebooks' => $ebooks, 'totalebookpages'=>$totalebookpages, 'totalebookchapters'=>$totalebookchapters, 'totalebookcharacters'=>$totalebookcharacters, 'actscount'=>$actscount, 'acts'=>$acts, 'actdata'=>$actdata, 'archetypedata'=>$archetypedata, 'plotsdata'=>$plotsdata]);
    }


    public function readscript(Request $request){
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
            $maincharacterdata = Character::where('main_character', 1)->where('ebook_id', $ebookid)->first();
        }

        $actscount = 0;
        $acts = null;
        if(session()->exists('movieid')){
            $movieid = session()->get('movieid');
            $acts = Act::where('movie_id', $movieid)->get();
            $actscount = $acts->count();
        }

        $actid = $request->id;
        $actdata = Act::where('id', $actid)->first();
        $plotsdata = Plot::with('plotroles')->with('actinglines')->where('act_id', $actid)->get();
        $archetypedata = Archetype::where('act_id', $actid)->first();
        
        
        return view('webapp.actor-script', ['ebookdata' => $ebookdata, 'ebookpages' => $ebookpages, 'ebookchapters' => $ebookchapters, 'ebookcharacters' => $ebookcharacters, 'ebooks' => $ebooks, 'totalebookpages'=>$totalebookpages, 'totalebookchapters'=>$totalebookchapters, 'totalebookcharacters'=>$totalebookcharacters, 'actscount'=>$actscount, 'acts'=>$acts, 'actdata'=>$actdata, 'archetypedata'=>$archetypedata, 'plotsdata'=>$plotsdata, 'maincharacterdata'=>$maincharacterdata]);
    }



    public function write(Request $request){
        $actid = $request->act_id;
        $movieid = session()->get('movieid');
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'plot_desc' => ['required', 'string']
        ]);
        
        $plot = New Plot();
        $plot->title = $request->title;
        $plot->plot_number = $request->plot_number;
        $plot->description = $request->plot_desc;
        $plot->movie_id = $movieid;
        $plot->act_id = $actid;
        $plot->save();
        $plot = $request->id;        
        return redirect(route('movie.act', $actid));
    }

    public function update(Request $request){
        $actid = $request->act_id;
        $plotid = $request->plot_id;
        $plot = Plot::find($plotid);
        $plot->plot_number = $request->plot_number;
        $plot->description = $request->plot_desc;
        $plot->title = $request->title;
        $plot->save();
        return redirect(route('movie.act', $actid));
    }


    public function writerole(Request $request){
        $plotid = $request->plot_id;
        $actid = $request->act_id;
        $movieid = session()->get('movieid');
        $request->validate([
            'role_desc' => ['required', 'string']
        ]);
        
        $plot_role = New PlotRole();
        $plot_role->archetype = $request->archetype;
        $plot_role->character = $request->character_id;
        $plot_role->role_desc = $request->role_desc;
        $plot_role->movie_id = $movieid;
        $plot_role->plot_id = $plotid;
        $plot_role->save();
        $plot_role = $request->id;        
        return redirect(route('movie.act', $actid));
    }

    public function writeline(Request $request){
        $actid = $request->act_id;
        $movieid = session()->get('movieid');
        $actingline = New ActingLines();
        $actingline->movie_id = $movieid;
        $actingline->plot_id = $request->plot_id;
        $actingline->character = $request->character;
        $actingline->line = $request->line;
        $actingline->save();
        return redirect(route('movie.actorscript', $actid));
    }
    

    public function deleterole(Request $request){
        $actid = $request->act_id;
        $plotrole_id = $request->plotrole_id;
        PlotRole::where('id',$plotrole_id)->delete();
        return redirect(route('movie.act', $actid));
    }

    public function deleteline(Request $request){
        $actid = $request->act_id;
        $line_id = $request->line_id;
        ActingLines::where('id',$line_id)->delete();
        return redirect(route('movie.actorscript', $actid));
    }
    public function delete(Request $request){

        $actid = $request->act_id;
        $plots = Plot::where('act_id',$actid)->get();
        foreach($plots as $plot)
        {
            $plotid = $plot->id;
            PlotRole::where('plot_id',$plotid)->delete();
            ActingLines::where('plot_id',$plotid)->delete();
        }
        Plot::where('act_id',$actid)->delete();
        Archetype::where('act_id',$actid)->delete();
        Act::where('id',$actid)->delete();
        return redirect(route('movie.archetypes'));
    }


}
