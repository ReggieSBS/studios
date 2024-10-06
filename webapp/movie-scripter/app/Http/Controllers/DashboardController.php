<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Act;
use App\Models\Plot;
use App\Models\Archetype;
use App\Models\ActingLines;
use App\Models\Ebook;
use App\Http\Traits\InitialTrait;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // use InitialTrait;
    
    public function dashboard(){
        // $ebooks = json_decode($ebooks);

        $completionprogress = 0;


        $movies = User::with('movies')->get();
        $ebooks = User::with('ebooks')->get();
  
        $ebookpages=[];
        $ebookchapters=[];
        $ebookcharacters=[];
        $ebooksdata = "";

        $ebookid = session()->get('ebookid');
        $movieid = session()->get('movieid');
        $ebookdata = Ebook::where('id', $ebookid)->first();
        $ebooksdata = Ebook::ebooksData();
        
        if(session()->exists('ebookid'))
        {
            $ebookpages = $ebooksdata[0];
            $ebookchapters = $ebooksdata[1];
            $ebookcharacters = $ebooksdata[2];

            if(count($ebookpages)>0)
            {
                $completionprogress = $completionprogress + 10;
            }
            if(count($ebookchapters)>0)
            {
                $completionprogress = $completionprogress + 10;
            }
            if(count($ebookcharacters)>0)
            {
                $completionprogress = $completionprogress + 10;
            }

        }

        if($movieid != "")
        {
            $completionprogress = $completionprogress + 20;
        }

        $actscount = 0;
        $archetypescount = 0;
        $plotscount = 0;
        $actscount = 0;
        $linescounts = 0;
        $chaptercheck = 1;
        $acts = null;
        if(session()->exists('movieid')){
            $movieid = session()->get('movieid');
            $acts = Act::where('movie_id', $movieid)->get();
            $actscount = $acts->count();
            $plots = Plot::where('movie_id', $movieid)->get();
            $plotscount = $plots->count();
            $lines = ActingLines::where('movie_id', $movieid)->get();
            $linescounts = $lines->count();
            $archetypes = Archetype::where('movie_id', $movieid)->get();
            $archetypescount = $archetypes->count();
            if($actscount > 0)
            {
                $completionprogress = $completionprogress + 10;
            }
            if($archetypescount > 0)
            {
                $completionprogress = $completionprogress + 10;
            }
            if($plotscount > 0)
            {
                $completionprogress = $completionprogress + 10;
            }
            if($linescounts > 0)
            {
                $completionprogress = $completionprogress + 10;
            }

            foreach($ebookchapters as $chapter)
            {
                if($chapter->archetype_id == NULL)
                {
                    $chaptercheck = 0;
                }   
            }

            if($chaptercheck == 1)
            {
                $completionprogress = $completionprogress + 10;
            }
        }
        else
        {
            $chaptercheck = 0;
        }

        $messagescount =0;
        $messages = Message::where('receiver', Auth::user()->id)->get();
        $messagescount = $messages->count();

        return view('webapp.dashboard', ['ebookpages' => $ebookpages, 'ebookchapters' => $ebookchapters, 'ebookcharacters' => $ebookcharacters, 'ebooks' => $ebooks, 'ebookdata'=>$ebookdata, 'actscount'=>$actscount, 'acts'=>$acts, 'completionprogress'=>$completionprogress, 'archetypescount'=>$archetypescount, 'plotscount'=>$plotscount, 'linescounts'=>$linescounts, 'chaptercheck'=>$chaptercheck, 'ebookid'=>$ebookid, 'messagescount'=>$messagescount, 'messages'=>$messages]);
    }

    

    public function deletemsg(Request $request){

        Message::where('receiver',Auth::user()->id)->delete();
        return redirect('/dashboard');
    }
}
