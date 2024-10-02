<?php

namespace App\Http\Traits;
use App\Models\Chapter;
use App\Models\Character;
use App\Models\Page;


trait EbookTrait
{
    public function scopeEbooksData(){
        if(session()->has('ebookid'))
        {
            $ebookid = session()->get('ebookid');
            $ebookpages = Page::query();
            $ebookpages = $ebookpages->where('ebook_id', $ebookid)->get();
            $ebookchapters = Chapter::query();
            $ebookchapters = $ebookchapters->where('ebook_id', $ebookid)->get();
            $ebookcharacters = Character::query();
            $ebookcharacters = $ebookcharacters->where('ebook_id', $ebookid)->get();
            $ebooksdata = array($ebookpages, $ebookchapters, $ebookcharacters);
            return $ebooksdata;
        }
    }
}