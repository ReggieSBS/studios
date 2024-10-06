<?php

namespace App\Http\Controllers;

use App\Models\Ebook;
use App\Models\User;
use App\Models\Act;
use App\Models\Page;
use App\Models\Chapter;
use App\Models\Message;
use App\Models\Movie;
use App\Models\Archetype;
use App\Models\Plot;
use App\Models\PlotRole;
use App\Models\ActingLines;
use App\Models\Character;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EbookController extends Controller
{   

    public function write(Request $request){

        Ebook::where('user_id', Auth::user()->id)->update(['active'=>0]);

        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'author' => ['required', 'string'],
            'publisher' => ['required', 'string']
        ]);

        // CHANGE IF DEPLOYED ONLINE
        $file = $request->file('cover');
        $namecover  = $file->getClientOriginalName();
        $file->storeAs('/app/public/images/covers/', $namecover, 'public');
        $cover = '/images/covers/'. $namecover;

        $fileebook = $request->file('ebook');
        $namefile  = $fileebook->getClientOriginalName();
        $fileebook->storeAs('/app/public/ebooks/', $namefile, 'public');
        $file = '/ebooks/'. $namefile;

        $ebook = New Ebook();
        $ebook->name = $request->title;
        $ebook->author = $request->author;
        $ebook->publisher = $request->publisher;
        $ebook->publish_date = $request->publish_date;
        $ebook->image = $cover;
        $ebook->file = $file;
        $ebook->active = 1;
        $ebook->user_id = Auth::user()->id;
        $ebook->save();
        $ebookid = $ebook->id;
        session()->put('ebookid', $ebookid);

        
        $message = New Message();
        $message->sender = 0;
        $message->receiver = Auth::user()->id;
        $message->message = "Congratulations!, I have seen that you've create a new e-book. The first steps are to define the amount of pages and chapters.. Are you ready to create your own movie? Ready? set... action!";
        $message->save();


        return redirect('/ebook/'.$ebookid);
    }

    public function read(Request $request)
    {
        session()->forget('ebookid');
        session()->forget('movieid');
        $conversionprogress = 0;
        $ebookid = $request->id;
        $ebookpages=[];
        $ebookchapters=[];
        $ebookcharacters=[];
        $totalebookpages = 0;
        $totalebookchapters = 0;
        session()->put('ebookid', $ebookid);

        $ebooks = User::with('ebooks')->get();
        $ebookscount = $ebooks->count();
        $ebookdata = Ebook::where('id', $ebookid)->first();
        $ebooksdata = Ebook::ebooksData();
        $ebookpages = $ebooksdata[0];
        $ebookchapters = $ebooksdata[1];
        $ebookcharacters = $ebooksdata[2];
        $totalebookpages = $ebookpages->count();
        $totalebookchapters = $ebookchapters->count();
        $totalebookcharacters = $ebookcharacters->count();

        if(count($ebookpages)>0)
        {
            $conversionprogress = $conversionprogress + 33;
        }
        if(count($ebookchapters)>0)
        {
            $conversionprogress = $conversionprogress + 33;
        }
        if(count($ebookcharacters)>0)
        {
            $conversionprogress = $conversionprogress + 33;
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


        return view('webapp.ebook', ['ebookdata' => $ebookdata, 'ebookpages' => $ebookpages, 'ebookchapters' => $ebookchapters, 'ebookcharacters' => $ebookcharacters, 'ebooks' => $ebooks, 'totalebookpages'=>$totalebookpages, 'totalebookchapters'=>$totalebookchapters, 'totalebookcharacters'=>$totalebookcharacters, 'actscount'=>$actscount, 'acts'=>$acts, 'conversionprogress'=>$conversionprogress, 'ebookscount'=>$ebookscount, 'messagescount'=>$messagescount, 'messages'=>$messages]);
    }

    public function content(Request $request){
        $ebookid = session()->get('ebookid');
        $responses = Ebook::query();
        $responses = $responses->where('id', $ebookid)->first();
        $value = $responses->overview_text;
        return response()->json([
            'responses' => $value
        ],200);
    }

    public function contentupdate(Request $request){
        $ebookid = session()->get('ebookid');
        $ebook = Ebook::find($ebookid);
        $ebook->overview_text = $request->value;
        if($ebook->save())
        {
            return("saved");
        }
        else
        {
            return("failed");
        }
    }
    
    public function extract(){
       
    }

    public function update(Request $request){
        $ebookid = session()->get('ebookid');
        $ebook = Ebook::find($ebookid);
        $ebook->name = $request->name;
        $ebook->author = $request->author;
        $ebook->publisher = $request->publisher;
        $ebook->publish_date = $request->publish_date;
        $ebook->save();
        return redirect('/ebook/'.$ebookid);
    }

    
    public function delete(Request $request){
        $ebookid = session()->get('ebookid');
        $movie = Movie::where('ebook_id', $ebookid)->first();
        if($movie){
            $movieid = $movie->id;
            Act::where('movie_id',$movieid)->delete();
            Plot::where('movie_id',$movieid)->delete();
            PlotRole::where('movie_id',$movieid)->delete();
            ActingLines::where('movie_id',$movieid)->delete();
            Archetype::where('movie_id',$movieid)->delete();
            Movie::where('id',$movieid)->delete();
        }

        Chapter::where('ebook_id',$ebookid)->delete();
        Page::where('ebook_id',$ebookid)->delete();
        Character::where('ebook_id',$ebookid)->delete();
        Ebook::where('id',$ebookid)->delete();

        return redirect('/dashboard');
    }

}
