<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Redirct;
use Auth;
use Session;

class UserController extends Controller {
    
    public function getSignupPage() {
    	
    	return view('auth.register');
    }

    public function postSignup(Request $request)
    {
    	$req = $request->all(); 
    	$user = user::create([
             'name' => $req['name'],
            'email' => $req['email'],
            'password' => bcrypt($req['password']),

    	]);
          Session::flash('flash_message','successfully Registered.');
    	 return redirect()->back();
    }

    public function getSignIn()
    {
    	return view('auth.login');
    }


    public function postSignIn(Request $request) {
    
        $userdata = array(
            'email'     => $request->get('email'),
            'password'  => $request->get('password')
            );

        if (Auth::attempt($userdata)) {

              return redirect()->route('success');
        } else {        
        return redirect()->route('login');
        }
    }

    public function getSuccessPage()
    {
    	return view('success');
    }

    public function doSignOut() {
        Auth::logout();
        Session::flush();
        return redirect()->route('login');
     }
}
