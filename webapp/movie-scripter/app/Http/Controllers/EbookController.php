<?php

namespace App\Http\Controllers;

use App\Models\Ebook;
use App\Models\User;
use App\Models\Chapter;
use App\Models\Character;
use App\Models\Page;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Store;
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

        $file = $request->file('cover');
        $namecover  = $file->getClientOriginalName();
        $file->storeAs('/app/public/images/covers/', $namecover, 'public');
        $cover = $file;

        $fileebook = $request->file('ebook');
        $namefile  = $fileebook->getClientOriginalName();
        $fileebook->storeAs('/app/public/ebooks/', $namefile, 'public');
        $file = $fileebook;

        $ebook = New Ebook();
        $ebook->name = $request->title;
        $ebook->author = $request->author;
        $ebook->publisher = $request->publisher;
        $ebook->image = $cover;
        $ebook->file = $file;
        $ebook->active = 1;
        $ebook->user_id = Auth::user()->id;
        $ebook->save();
        $ebookid = $ebook->id;
        session()->put('ebookid', $ebookid);
        return redirect('/ebook/'.$ebookid);
    }

    public function read(Request $request){
        $ebookpages='';
        $ebookchapters='';
        $ebookcharacters='';
        $ebookid = $request->id;
        session()->put('ebookid', $ebookid);
        $ebooks = User::with('ebooks')->get();

        $ebookdata = Ebook::query();
        $ebookdata = $ebookdata->where('id', $ebookid)->first();

        $ebooksdata = Ebook::ebooksData();
        if(!empty($ebooksdata[0])){
            $ebookpages = $ebooksdata[0];
        }
        if(!empty($ebooksdata[1])){
            $ebookchapters = $ebooksdata[1];
        }
        if(!empty($ebooksdata[2])){
            $ebookcharacters = $ebooksdata[2];
        }

        return view('webapp.ebook', ['ebookdata' => $ebookdata, 'ebookpages' => $ebookpages, 'ebookchapters' => $ebookchapters, 'ebookcharacters' => $ebookcharacters, 'ebooks' => $ebooks]);
    }

}
