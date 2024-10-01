<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ebook;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
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

        
        $cover = $request->file('cover')->store('/app/public/images/covers');
        $file = $request->file('ebook')->store('/app/public/covers');

        //save format
        // Storage::disk('public_covers')->put($cover, $cover);
        $path_cover = env('APP_URL').'/app/public/images/covers';
        // Storage::disk('public_ebooks')->put($file, $file);
        $path_ebooks = env('APP_URL').'/app/public/ebooks';

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
