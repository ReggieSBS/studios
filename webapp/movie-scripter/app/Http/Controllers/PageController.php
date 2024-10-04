<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Ebook;
use App\Models\User;

class PageController extends Controller
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

        $pageid = $request->id;        
        session()->put('pageid', $pageid);
        $pagedata = Page::query();
        $pagedata = $pagedata->where('id', $pageid)->first();

        return view('webapp.page', ['ebooksdata'=>$ebooksdata,'ebookpages' => $ebookpages, 'ebookchapters' => $ebookchapters, 'ebookcharacters' => $ebookcharacters, 'ebooks' => $ebooks, 'ebookdata'=>$ebookdata, 'pagedata'=>$pagedata]);
    }
    
    public function write(Request $request){
        
        $amount = $request->amount;

        $ebookid = session()->get('ebookid');

        for($i=1;$i<=$amount;$i++)
        {;
            $page = New Page();
            $page->page_number = $i;
            $page->ebook_id = $ebookid;
            $page->save();
        }

        return redirect('/page/1');
    }


    
    public function content(Request $request){
        $pageid = session()->get('pageid');
        $responses = Page::query();
        $responses = $responses->where('id', $pageid)->first();
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

}
