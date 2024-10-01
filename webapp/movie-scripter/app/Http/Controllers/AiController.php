<?php

namespace App\Http\Controllers;

use App\Models\Ai;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class AiController extends Controller
{
    public function write(Request $request)
    {
        $data = json_decode($request->getContent());
        $ai_request = New Ai();
        $ai_request->message = $data->request;
        $ai_request->request = 1;
        $ai_request->user_id = Auth::user()->id;
        $ai_request->save();
    }


    public function read()
    {
        $responses = Ai::query();
        $responses = $responses->where('user_id', Auth::user()->id)->latest()->get();

        return response()->json([
            'responses' => $responses
        ],200);
    }
}
