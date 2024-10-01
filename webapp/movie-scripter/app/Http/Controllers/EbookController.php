<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ebook;

class EbookController extends Controller
{   
    public function write(Request $request){

        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'author' => ['required', 'string'],
            'publisher' => ['required', 'string'],
            'cover' => ['required', 'image'],
            'ebook' => ['required', 'file']
        ]);

        if($request->hasFile('cover')){
            $cover = $request->file('cover')->store('public_covers');
        }

        if($request->hasFile('ebook')){
            $ebook = $request->file('ebook')->store('local_ebooks');
        }
        
        $data['name'] = $request->title;
        $data['author'] = $request->author;
        $data['publisher'] = $request->publisher;
        $data['image'] = $cover;
        $data['file'] = $ebook;
        $data['user_id'] = auth()->id();
        $ebook = Ebook::create($data);
        if(!$ebook)
        {
            return redirect(route('ebooks'))->with("error","Unable to upload e-book, please try again");
        }
        return redirect(route('ebooks'))->with("success","E-book uploaded succesfully");
    }

}
