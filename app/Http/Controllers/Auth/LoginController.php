<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class LoginController extends Controller
{
    public function displayLogin(Request $request){
        return Inertia::render("home/login");
    }

    
    public function logoutBilly()
    {
        Auth::logout();
        return redirect()->intended("homeBilly");
    }

    public function login(Request $req){

        $credentials=$req->validate([
            "email" => ["required",
                        "email"],
            "password"=> ["required"]
        ]);

        if (Auth::attempt($credentials)){

            $req->session()->regenerate();

            return redirect()->intended("home/bonjour");
        }
        
        return back()->withErrors([
            "email"=> "Erreur de mot de passe"
        ]);

    }

    public function loginBis(Request $req){

        $credentials=$req->validate([
            "name" => ["required"],
            "password"=> ["required"]
        ]);

        if (Auth::attempt($credentials)){

            $req->session()->regenerate();

            return redirect()->intended("testo");
        }
        
        return back()->withErrors([
            "password"=> "Erreur de mot de passe"
            ]);

    }
}
