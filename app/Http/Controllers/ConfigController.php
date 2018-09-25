<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class ConfigController extends Controller
{
    public function changeLanguage($locale){
        
        App::setLocale($locale);
        
        session(['lang' => $locale]);

        return redirect()->back();
    }
}
