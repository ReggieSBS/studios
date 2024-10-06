<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ebook;
use App\Models\PlotRole;
use App\Models\Plot;
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
        $plotsdata = Plot::where('act_id', $actid)->get();

        $archetypedata = Archetype::where('act_id', $actid)->first();
        
        return view('webapp.act', ['ebookdata' => $ebookdata, 'ebookpages' => $ebookpages, 'ebookchapters' => $ebookchapters, 'ebookcharacters' => $ebookcharacters, 'ebooks' => $ebooks, 'totalebookpages'=>$totalebookpages, 'totalebookchapters'=>$totalebookchapters, 'totalebookcharacters'=>$totalebookcharacters, 'actscount'=>$actscount, 'acts'=>$acts, 'actdata'=>$actdata, 'archetypedata'=>$archetypedata, 'plotsdata'=>$plotsdata]);
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
        $plot_role->character_id = $request->character_id;
        $plot_role->role_desc = $request->role_desc;
        $plot_role->movie_id = $movieid;
        $plot_role->plot_id = $plotid;
        $plot_role->save();
        $plot_role = $request->id;        
        return redirect(route('movie.act', $actid));
    }

}
