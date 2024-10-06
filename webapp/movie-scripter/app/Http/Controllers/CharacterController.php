<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\Ebook;
use App\Models\User;
use App\Models\Act;
use App\Models\Plot;
use App\Models\Archetype;
use App\Models\PlotRole;
use App\Models\ActingLines;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CharacterController extends Controller
{

    public function overview(){
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

        return view('webapp.characters', ['ebooksdata'=>$ebooksdata,'ebookpages' => $ebookpages, 'ebookchapters' => $ebookchapters, 'ebookcharacters' => $ebookcharacters, 'ebooks' => $ebooks, 'ebookdata'=>$ebookdata, 'maincharacterdata'=>$maincharacterdata, 'secondarycharacterdata'=>$secondarycharacterdata, 'seccharacteravailable'=>$seccharacteravailable, 'actscount'=>$actscount, 'acts'=>$acts, 'messagescount'=>$messagescount, 'messages'=>$messages]);
    }
   
    public function read(Request $request){
        $ebookpages=[];
        $ebookchapters=[];
        $ebookcharacters=[];

        $characterid = $request->id;
        session()->put('characterid', $characterid);

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

        $characterdata = Character::query();
        $characterdata = $characterdata->where('id', $characterid)->first();


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

        return view('webapp.character', ['ebooksdata'=>$ebooksdata,'ebookpages' => $ebookpages, 'ebookchapters' => $ebookchapters, 'ebookcharacters' => $ebookcharacters, 'ebooks' => $ebooks, 'ebookdata'=>$ebookdata, 'characterdata'=>$characterdata, 'actscount'=>$actscount, 'acts'=>$acts, 'messagescount'=>$messagescount, 'messages'=>$messages]);
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


    public function delete(Request $request){
        $characterid = session()->get('characterid');
        $character = Character::find($characterid);
        
        $archetypes = Archetype::where('character_id',$characterid);

        foreach($archetypes as $archetype)
        {
            $archtypeid = $archetype->id;
            $actid = $archetype->id;
            $plots = Plot::where('act_id',$actid)->get();
            foreach($plots as $plot)
            {
                $plotid = $plot->id;
                PlotRole::where('plot_id',$plotid)->delete();
                ActingLines::where('plot_id',$plotid)->delete();
            }
            Plot::where('act_id',$actid)->delete();
            Archetype::where('id',$archtypeid)->delete();
            Act::where('id',$actid)->delete();
        }
        Character::where('id',$character->id)->delete();

        return redirect('/characters');
    }

    
    
}
