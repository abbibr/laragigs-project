<?php

namespace App\Http\Controllers\auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __construct(){
        $this->middleware('guest');
    }

    public function register(){
        return view('auth.register');
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        Auth::attempt([
            'email' => $request->email, 
            'password' => $request->password
        ]);

        return to_route('register.store')->with('message','User successfully created');
    }
}
