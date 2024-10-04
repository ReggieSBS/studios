<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\Ebook;
use App\Models\User;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    
    public function read(Request $request){
        $ebookpages=[];
        $ebookchapters=[];
        $ebookcharacters=[];
        $ebookid = session()->get('ebookid');
        $ebooks = User::with('ebooks')->get();

        $ebookdata = Ebook::query();
        $ebookdata = $ebookdata->where('id', $ebookid)->first();

        $ebooksdata = Ebook::ebooksData();
        if(session()->exists('ebookid'))
        {
            $ebookpages = $ebooksdata[0];
            $ebookchapters = $ebooksdata[1];
            $ebookcharacters = $ebooksdata[2];
        }

        $chapterid = $request->id;        
        session()->put('chapterid', $chapterid);
        $chapterdata = Chapter::query();
        $chapterdata = $chapterdata->where('id', $chapterid)->first();
        $previouschapter = $chapterdata->chapter_number - 1;
        $nextchapter = $chapterdata->chapter_number + 1;


        $disnxtchp = 0;
        $chapterdatachk = Chapter::query();
        $chaptercheck = $chapterdatachk->where('ebook_id', $ebookid)->latest('id')->first();;
        $lastchapter = $chaptercheck->chapter_number;
        if($lastchapter<$nextchapter)
        {
            $disnxtchp = 1;
        }

        return view('webapp.chapter', ['ebooksdata'=>$ebooksdata,'ebookpages' => $ebookpages, 'ebookchapters' => $ebookchapters, 'ebookcharacters' => $ebookcharacters, 'ebooks' => $ebooks, 'ebookdata'=>$ebookdata, 'chapterdata'=>$chapterdata, 'previouschapter'=>$previouschapter, 'nextchapter'=>$nextchapter, 'disnxtchp'=>$disnxtchp]);
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
        $responses = Chapter::query();
        $responses = $responses->where('id', $chapterid)->first();
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


}
