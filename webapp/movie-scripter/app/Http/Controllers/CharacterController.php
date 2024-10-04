<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\Ebook;
use App\Models\User;
use Illuminate\Http\Request;

class CharacterController extends Controller
{

    public function overview(){
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

            $characterdata = Character::characterData();

            $maincharacterdata = $characterdata[0];
            $secondarycharacterdata = $characterdata[1];

            if(empty($characterdata[1]))
            {
                $seccharacteravailable = 0;
            }   
            else
            {
                $seccharacteravailable = 1;
            }


        }

        return view('webapp.characters', ['ebooksdata'=>$ebooksdata,'ebookpages' => $ebookpages, 'ebookchapters' => $ebookchapters, 'ebookcharacters' => $ebookcharacters, 'ebooks' => $ebooks, 'ebookdata'=>$ebookdata, 'maincharacterdata'=>$maincharacterdata, 'secondarycharacterdata'=>$secondarycharacterdata, 'seccharacteravailable'=>$seccharacteravailable]);
    }
   
    public function read(Request $request){
        $ebookpages=[];
        $ebookchapters=[];
        $ebookcharacters=[];

        $characterid = $request->id;
        session()->put('characterid', $characterid);

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

    
    public function updatedetails(Request $request){
        $characterid = session()->get('characterid');
        $character = Character::find($characterid);
        $character->age = $request->age;
        $character->gender = $request->gender;
        $character->save();
        return redirect('/character/'.$characterid);
    }
    
}
