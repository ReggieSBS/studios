<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ebook;
use App\Models\User;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Store;
use Illuminate\Support\Facades\Auth;

class EbookController extends Controller
{   
    public function write(Request $request){

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
        $ebook->user_id = Auth::user()->id;
        $ebook->save();
        $ebookid = $ebook->id;
        return redirect('/ebook/'.$ebookid);
    }

    public function read(Request $request){
        $ebookid = $request->id;
        $ebooks = User::with('ebooks')->get();
        $ebookdata = Ebook::query();
        $ebookdata = $ebookdata->where('id', $ebookid)->first();
        return view('webapp.ebook', ['ebookdata' => $ebookdata, 'ebooks' => $ebooks]);
    }

}
