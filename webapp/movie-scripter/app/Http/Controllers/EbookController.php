<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ebook;
use Illuminate\Support\Facades\Auth;

class EbookController extends Controller
{   
    public function write(Request $request){

        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'author' => ['required', 'string'],
            'publisher' => ['required', 'string'],
            'cover' => ['image'],
            'ebook' => ['file']
        ]);

        
        $cover = $request->file('cover')->store('public_covers');
        $file = $request->file('ebook')->store('local_ebooks');

        $ebook = New Ebook();
        $ebook->name = $request->title;
        $ebook->author = $request->author;
        $ebook->publisher = $request->publisher;
        $ebook->image = $cover;
        $ebook->file = $file;
        $ebook->user_id = Auth::user()->id;
        $ebook->save();
        $ebookid = $ebook->id;
        return redirect('/ebook/'.$ebookid);
    }

    public function read(Request $request){
        $ebookid = $request->id;

        $ebookdata = Ebook::query();
        $ebookdata = $ebookdata->where('id', $ebookid)->first();
        return view('webapp.ebook', ['ebookdata' => $ebookdata]);
    }

}
