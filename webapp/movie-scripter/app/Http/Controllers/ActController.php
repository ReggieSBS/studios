<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActController extends Controller
{
    public function overview(){
        return view('webapp.acts', ['test'=>'test']);
    }
}
