<?php

namespace App\Http\Controllers\auth;

use auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LogoutController extends Controller
{
    public function logout(){
        auth()->logout();
        return redirect('/');
    }
}
