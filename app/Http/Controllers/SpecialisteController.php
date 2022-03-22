<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class SpecialisteController extends Controller
{
    
   
    public function logBilly()
    {
        return Inertia ::render("billy/login");
    }


}
