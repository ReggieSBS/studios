<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\Ebook;
use App\Models\Act;
use App\Models\chapterCharacters;
use App\Models\Message;
use App\Models\Page;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChapterController extends Controller
{
    
    public function read(Request $request){
        $ebookpages=[];
        $ebookchapters=[];
        $ebookcharacters=[];
        $ebookid = session()->get('ebookid');
        $ebooks = User::with('ebooks')->get();

        $ebookdata = Ebook::where('id', $ebookid)->first();

        $ebooksdata = Ebook::ebooksData();
        if(session()->exists('ebookid'))
        {
            $ebookpages = $ebooksdata[0];
            $ebookchapters = $ebooksdata[1];
            $ebookcharacters = $ebooksdata[2];
        }

        $chapterid = $request->id;        
        session()->put('chapterid', $chapterid);
        $chapterdata = Chapter::where('id', $chapterid)->with('characters')->first();
        $previouschapter = $chapterdata->chapter_number - 1;
        $nextchapter = $chapterdata->chapter_number + 1;

        


        $nxtchp = 0;
        $chapterdatachk = Chapter::where('ebook_id', $ebookid)->latest('id')->first();
        $lastchapter = $chapterdatachk->chapter_number;
        $newchapter = $lastchapter + 1;
        if($nextchapter<=$lastchapter)
        {
            $nxtchp = 1;
        }

        
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

        $chapterpages = Page::where('chapter_id', $chapterid)->get();

        return view('webapp.chapter', ['ebooksdata'=>$ebooksdata,'ebookpages' => $ebookpages, 'ebookchapters' => $ebookchapters, 'ebookcharacters' => $ebookcharacters, 'ebooks' => $ebooks, 'ebookdata'=>$ebookdata, 'chapterdata'=>$chapterdata, 'previouschapter'=>$previouschapter, 'nextchapter'=>$nextchapter, 'nxtchp'=>$nxtchp, 'newchapter'=>$newchapter, 'chapterpages'=>$chapterpages, 'actscount'=>$actscount, 'acts'=>$acts, 'messagescount'=>$messagescount, 'messages'=>$messages]);
    }
    
    public function write(Request $request){
        
        $amount = $request->amount;

        $ebookid = session()->get('ebookid');

        for($i=1;$i<=$amount;$i++)
        {;
            $chapter = New Chapter();
            $chapter->chapter_number = $i;
            $chapter->ebook_id = $ebookid;
            $chapter->save();
        }

        return redirect('/chapter/1');
    }


    public function new(Request $request){

        $ebookid = session()->get('ebookid');

        $chapter = New Chapter();
        $chapter->chapter_number = $request->chapter_number;
        $chapter->title = $request->title;
        $chapter->ebook_id = $ebookid;
        $chapter->save();
        $chapterid = $chapter->id;

        return redirect('/chapter/'.$chapterid);
    }

    public function relation(Request $request){
        $chapterid = session()->get('chapterid');
        foreach($request->characters as $character)
        {
            $relation = New chapterCharacters();
            $relation->character_id = $character;
            $relation->chapter_id = $chapterid;
            $relation->save();
        }
        return redirect('/chapter/'.$chapterid);
    }

    public function pages(Request $request){

        $chapterid = session()->get('chapterid');
        Page::where('chapter_id', $chapterid)->update((['chapter_id'=>'0']));

        if($request->page!=null)
        {
            foreach($request->page as $page)
            {
                $page = Page::find($page);
                $page->chapter_id = $chapterid;
                $page->save();
            }
        }

        return redirect('/chapter/'.$chapterid);
    }


    public function writesummery(Request $request){
        $chapterid = session()->get('chapterid');
        $chapter = Chapter::find($chapterid);
        $chapter->summery = $request->summery;
        $chapter->save();
        return redirect('/chapter/'.$chapterid);
    }
    

    public function content(Request $request){
        $chapterid = session()->get('chapterid');
        $responses = Chapter::query();
        $responses = $responses->where('id', $chapterid)->first();
        $value = $responses->content;
        return response()->json([
            'responses' => $value
        ],200);
    }

    public function metadata(Request $request){
        $chapterid = session()->get('chapterid');
        $responses = Chapter::where('id', $chapterid)->first();
        $title = $responses->title;
        $chapter_number = $responses->chapter_number;
        return response()->json([
            'title' => $title,
            'chapter_number' => $chapter_number
        ],200);
    }

    public function contentupdate(Request $request){
        $chapterid = session()->get('chapterid');
        $chapter = Chapter::find($chapterid);
        $chapter->content = $request->value;
        if($chapter->save())
        {
            return("saved");
        }
        else
        {
            return("failed");
        }
    }

    public function chapternr(Request $request){
        $chapterid = session()->get('chapterid');
        $chapter = Chapter::find($chapterid);
        $chapter->chapter_number = $request->value;
        if($chapter->save())
        {
            return("saved");
        }
        else
        {
            return("failed");
        }
    }

    public function chaptertitle(Request $request){
        $chapterid = session()->get('chapterid');
        $chapter = Chapter::find($chapterid);
        $chapter->title = $request->value;
        if($chapter->save())
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
        $chapter_id = $request->chapter_id;
        Page::where('chapter_id', $chapter_id)->update((['chapter_id'=>'0']));
        Chapter::where('id',$chapter_id)->delete();
        return redirect('/ebooks/'.$ebookid);
    }


}
