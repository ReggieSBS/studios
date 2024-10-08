<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function pay(Request $request){
        $subscription = $request->type;

    return view('pay', ['subscription' => $subscription]);
    }
}
