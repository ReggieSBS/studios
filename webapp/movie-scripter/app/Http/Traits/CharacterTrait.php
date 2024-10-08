<?php

namespace App\Http\Traits;
use App\Models\Chapter;
use App\Models\Character;
use App\Models\Page;


trait CharacterTrait
{
    public function scopeCharacterData(){
        if(session()->has('ebookid'))
        {
            $ebookid = session()->get('ebookid');
            $maincharacterdata = Character::query();
            $maincharacterdata = $maincharacterdata->where('ebook_id', $ebookid)->where('main_character', 1)->first();
            $secondarycharacterdata = Character::query();
            $secondarycharacterdata = $secondarycharacterdata->where('ebook_id', $ebookid)->where('main_character', 2)->first();

            $allcharacters = array($maincharacterdata, $secondarycharacterdata);
            return $allcharacters;
        }
    }
}