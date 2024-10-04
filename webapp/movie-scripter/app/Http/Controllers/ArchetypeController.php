<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArchetypeController extends Controller
{
    public function overview(){
        return view('webapp.archetypes', ['test'=>'test']);
    }
}
