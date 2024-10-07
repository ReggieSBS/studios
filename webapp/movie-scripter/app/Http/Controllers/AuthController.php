<?php

namespace App\Http\Controllers;

use App\Jobs\RegisterEmailJob;
use App\Mail\WelcomeEmail;
use App\Models\License;
use App\Models\Subscription;
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

        Mail::to($request->email)->send(new WelcomeEmail($request->name));
        // RegisterEmailJob::dispatch($request->email, $request->name);

        $userid = $user->id;
        $license = md5(microtime());

        $license = New License();
        $license->title = $request->license_type;
        $license->license_nr = $license;
        $license->development = 0;
        $license->save();
        $license_id = $license->id;
        
        $subscription = New Subscription();
        $subscription->user_id = $userid;
        $subscription->licence_id = $license_id;
        $subscription->accepted = date('Y-m-d');
        $subscription->save();

        if(!$user)
        {
            return redirect(route('register'))->with("error","Registration attempt failed, please try again");
        }
        return redirect(route('login'))->with("success","Registration succesfull please login");
    }
    public function update(Request $request){
        
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users'
        ]);

        $profile_image = $request->file('profile_image');
        $namefile  = $profile_image->getClientOriginalName();
        $profile_image->storeAs('/app/public/images/', $namefile, 'public');
        $file = '/images/'. $namefile;

        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->profile_image = $file;
        $user->save();
    }

    
    public function updatepassword(Request $request){
        
        if($request->password == $request->confirm_password)
        {
            $pass = Hash::make($request->confirm_password);
            $user = User::find(Auth::user()->id);
            $user->password = $pass;
            $user->save();
            
            Session::flush();
            Auth::logout();
            return redirect(route('login'));
        }
        else
        {
            return redirect('/account');
        }
        
    }

    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }
}
