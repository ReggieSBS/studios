<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\Ebook;
use App\Models\User;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
   
    public function read(Request $request){
        $ebookpages=[];
        $ebookchapters=[];
        $ebookcharacters=[];

        $characterid = $request->characterid;

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

        
        $characterdata = Character::query();
        $characterdata = $characterdata->where('id', $characterid)->first();

        return view('webapp.character', ['ebooksdata'=>$ebooksdata,'ebookpages' => $ebookpages, 'ebookchapters' => $ebookchapters, 'ebookcharacters' => $ebookcharacters, 'ebooks' => $ebooks, 'ebookdata'=>$ebookdata, 'characterdata'=>$characterdata]);
    }
    
    public function write(Request $request){
        
        $amount = $request->amount;

        $ebookid = session()->get('ebookid');
        
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string'],
            'main_character' => ['required', 'integer']
        ]);

        if($request->file('profileimage'))
        {
            $file = $request->file('profileimage');
            $profileimage  = $file->getClientOriginalName();
            $file->storeAs('/app/public/images/covers/', $profileimage, 'public');
            $profileimage = $file;
        }

        $character = New Character();
        $character->ebook_id  = $ebookid;
        $character->main_character = $request->main_character;
        $character->name = $request->name;
        $character->gender = $request->gender;
        $character->age = $request->age;
        $character->profile_image = $profileimage;
        $character->save();

        $characterid = $character->id;

        return redirect('/character/'.$characterid);
    }
}
