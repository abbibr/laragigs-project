<?php

namespace App\Http\Controllers\auth;

use auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function __construct(){
        $this->middleware('guest');
    }
    
    public function login(){
        return view('auth.login');
    }

    public function store(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(!auth()->attempt(['email' => $request->email, 'password' => $request->password])){
            return back()->with('message', 'Invalid Login Details');
        }

        return redirect('/');
    }
}
