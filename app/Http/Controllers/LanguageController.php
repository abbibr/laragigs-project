<?php

namespace App\Http\Controllers;

use session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class LanguageController extends Controller
{
    public function switchLang($lang){
        if(array_key_exists($lang, Config::get('languages'))){
            session()->put('applocale', $lang);
        }

        return redirect()->back();
    }
}
