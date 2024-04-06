<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DemandeurController extends Controller
{
    public function liste_demandeur(){
         return view('demandeur.liste');
    }
}
