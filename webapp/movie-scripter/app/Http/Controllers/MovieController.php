<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function overview(){
        return view('webapp.questions', ['test'=>'test']);
    }
    public function formula(){
        return view('webapp.formula', ['test'=>'test']);
    }
}
