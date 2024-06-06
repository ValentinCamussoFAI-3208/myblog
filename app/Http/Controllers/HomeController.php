<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Muestra la pantalla principal del blog
    public function getHome() {
        return view('home');
    }
}
