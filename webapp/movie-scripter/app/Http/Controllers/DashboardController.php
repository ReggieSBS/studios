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
use App\Models\Chapter;
use App\Models\Character;
use App\Models\Message;
use App\Models\Page;
use App\Models\Subscription;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // use InitialTrait;
    
    public function dashboard(){
        // $ebooks = json_decode($ebooks);

        $completionprogress = 0;
        $ebookid = session()->get('ebookid');
        $movieid = session()->get('movieid');
        $pageid = session()->get('pageid');
        $chapterid = session()->get('chapterid');
        $characterid = session()->get('characterid');
        $last_page_seen = Page::where('id', $pageid)->first();
        $last_chapter_seen = Chapter::where('id', $chapterid)->first();
        $last_character_seen = Character::where('id', $characterid)->first();


        $movies = User::with('movies')->get();
        $ebooks = User::with('ebooks')->get();
  
        $ebookpages=[];
        $ebookchapters=[];
        $ebookcharacters=[];
        $ebooksdata = "";

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

        return view('webapp.dashboard', ['ebookpages' => $ebookpages, 'ebookchapters' => $ebookchapters, 'ebookcharacters' => $ebookcharacters, 'ebooks' => $ebooks, 'ebookdata'=>$ebookdata, 'actscount'=>$actscount, 'acts'=>$acts, 'completionprogress'=>$completionprogress, 'archetypescount'=>$archetypescount, 'plotscount'=>$plotscount, 'linescounts'=>$linescounts, 'chaptercheck'=>$chaptercheck, 'ebookid'=>$ebookid, 'messagescount'=>$messagescount, 'messages'=>$messages, 'last_page_seen'=>$last_page_seen, 'last_chapter_seen'=>$last_chapter_seen, 'last_character_seen'=>$last_character_seen]);
    }

    




    
    public function account(){
       
        $ebookid = session()->get('ebookid');
        $movieid = session()->get('movieid');
        $ebookpages=[];
        $ebookchapters=[];
        $ebookcharacters=[];
        $totalebookpages = 0;
        $totalebookchapters = 0;
        $totalebookcharacters = 0;

        $ebooks = User::with('ebooks')->get();
        $ebookscount = Ebook::where('user_id', Auth::user()->id)->get()->count();
        $ebookdata = Ebook::where('id', $ebookid)->first();
        $ebooksdata = Ebook::ebooksData();
        if(session()->exists('ebookid'))
        {
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
            $conversionprogress = 100;
        }

        $messagescount =0;
        $messages = Message::where('receiver', Auth::user()->id)->get();
        $messagescount = $messages->count();

        return view('webapp.account', ['ebookdata' => $ebookdata, 'ebookpages' => $ebookpages, 'ebookchapters' => $ebookchapters, 'ebookcharacters' => $ebookcharacters, 'ebooks' => $ebooks, 'totalebookpages'=>$totalebookpages, 'totalebookchapters'=>$totalebookchapters, 'totalebookcharacters'=>$totalebookcharacters, 'actscount'=>$actscount, 'acts'=>$acts, 'ebookscount'=>$ebookscount, 'messagescount'=>$messagescount, 'messages'=>$messages]);
    }



    
    public function subscription(){
       
        $ebookid = session()->get('ebookid');
        $movieid = session()->get('movieid');
        $ebookpages=[];
        $ebookchapters=[];
        $ebookcharacters=[];
        $totalebookpages = 0;
        $totalebookchapters = 0;
        $totalebookcharacters = 0;
        $ebooks = User::with('ebooks')->get();
        $subscription = Subscription::select('user_subscriptions.licence_id','licences.title', 'licences.license_nr', 'licences.price', 'licences.created_at')->where('user_id', Auth::user()->id)->leftJoin('licences', 'licences.id', '=', 'user_subscriptions.licence_id')->first();


        $ebookscount = Ebook::where('user_id', Auth::user()->id)->get()->count();
        $ebookdata = Ebook::where('id', $ebookid)->first();
        $ebooksdata = Ebook::ebooksData();

        if(session()->exists('ebookid'))
        {
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
            $conversionprogress = 100;
        }

        $messagescount =0;
        $messages = Message::where('receiver', Auth::user()->id)->get();
        $messagescount = $messages->count();

        return view('webapp.subscription', ['ebookdata' => $ebookdata, 'ebookpages' => $ebookpages, 'ebookchapters' => $ebookchapters, 'ebookcharacters' => $ebookcharacters, 'ebooks' => $ebooks, 'totalebookpages'=>$totalebookpages, 'totalebookchapters'=>$totalebookchapters, 'totalebookcharacters'=>$totalebookcharacters, 'actscount'=>$actscount, 'acts'=>$acts, 'ebookscount'=>$ebookscount, 'messagescount'=>$messagescount, 'messages'=>$messages, 'subscription'=>$subscription]);
    }


    public function deletemsg(Request $request){

        Message::where('receiver',Auth::user()->id)->delete();
        return redirect('/dashboard');
    }
}
