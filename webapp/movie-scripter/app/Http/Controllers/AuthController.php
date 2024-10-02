<?php

namespace App\Http\Controllers;

use App\Jobs\RegisterEmailJob;
use App\Mail\WelcomeEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class AuthController extends Controller
{
    //
    public function register(){
        return view('register');
    }
    public function login(){
        return view('login');
    }
    public function loginAttempt(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email','password');
        if(Auth::attempt($credentials)){
            return redirect()->intended(route('dashboard'));
        }
        return redirect(route('login'))->with("error","Login attempt failed");
    }
    public function registerAttempt(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);

        // Mail::to($request->email)->send(new WelcomeEmail($request->name));
        RegisterEmailJob::dispatch($request->email, $request->name);

        if(!$user)
        {
            return redirect(route('register'))->with("error","Registration attempt failed, please try again");
        }
        return redirect(route('login'))->with("success","Registration succesfull please login");
    }

    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }
}
