<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Act;
use App\Models\Chapter;
use App\Models\Ebook;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function read(Request $request){
        $ebookpages=[];
        $ebookchapters=[];
        $ebookcharacters=[];
        $totalebookpages = 0;
        $totalebookchapters = 0;
        $totalebookcharacters = 0;
        $ebookid = session()->get('ebookid');
        $ebooks = User::with('ebooks')->get();

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

        $pageid = $request->id;        
        session()->put('pageid', $pageid);
        $pagedata = Page::where('id', $pageid)->first();
        $previouspage = $pagedata->page_number - 1;
        $nextpage = $pagedata->page_number + 1;


        $nxtpg = 0;
        $pagechk = Page::where('ebook_id', $ebookid)->latest('id')->first();
        $lastpage = $pagechk->page_number;
        $newpage = $lastpage + 1;
        if($lastpage<$nextpage)
        {
            $nxtpg = 1;
        }

        $chapter_id = $pagedata->chapter_id;
        $chapter = Chapter::query();
        $chapterdata = $chapter->where('id', $chapter_id)->first();
        $countchapters = $chapter->where('id', $chapter_id)->get()->count();

        
        $actscount = 0;
        $acts = null;
        if(session()->exists('movieid')){
            $movieid = session()->get('movieid');
            $acts = Act::where('movie_id', $movieid)->get();
            $actscount = $acts->count();
        }

        $messagescount =0;
        $messages = Message::where('receiver', Auth::user()->id)->get();
        $messagescount = $messages->count();

        return view('webapp.page', ['ebooksdata'=>$ebooksdata,'ebookpages' => $ebookpages, 'ebookchapters' => $ebookchapters, 'ebookcharacters' => $ebookcharacters, 'ebooks' => $ebooks, 'ebookdata'=>$ebookdata, 'pagedata'=>$pagedata, 'previouspage'=>$previouspage, 'nextpage'=>$nextpage, 'nxtpg'=>$nxtpg, 'newpage'=>$newpage, 'chapterdata'=>$chapterdata, 'countchapters'=>$countchapters, 'actscount'=>$actscount, 'acts'=>$acts, 'messagescount'=>$messagescount, 'messages'=>$messages, 'totalebookpages'=>$totalebookpages, 'totalebookchapters'=>$totalebookchapters, 'totalebookcharacters'=>$totalebookcharacters]);
    }
    
    public function write(Request $request){
        
        $amount = $request->amount;
        $ebookid = $request->ebookid;

        for($i=1;$i<=$amount;$i++)
        {;
            $page = New Page();
            $page->page_number = $i;
            $page->ebook_id = $ebookid;
            $page->save();
        }

        return redirect('/page/1');
    }

    public function writesummery(Request $request){
        $pageid = session()->get('pageid');
        $page = Page::find($pageid);
        $page->summery = $request->summery;
        $page->save();
        return redirect('/page/'.$pageid);
    }

    public function new(Request $request){

        $ebookid = session()->get('ebookid');

        $page = New Page();
        $page->page_number = $request->page_number;
        $page->chapter_id = $request->chapter_number;
        $page->ebook_id = $ebookid;
        $page->save();
        $pageid = $page->id;

        return redirect('/page/'.$pageid);
    }
    
    public function content(Request $request){
        $pageid = session()->get('pageid');
        $responses = Page::where('id', $pageid)->first();
        $value = $responses->content;
        return response()->json([
            'responses' => $value
        ],200);
    }

    public function contentupdate(Request $request){
        $pageid = session()->get('pageid');
        $page = Page::find($pageid);
        $page->content = $request->value;
        if($page->save())
        {
            return("saved");
        }
        else
        {
            return("failed");
        }
    }


    
    public function delete(Request $request){
        $ebookid = session()->get('ebookid');
        $pageid = $request->page_id;
        Page::where('id',$pageid)->delete();
        return redirect('/ebook/'.$ebookid);
    }

}
