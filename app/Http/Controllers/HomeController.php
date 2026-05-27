<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

    //Esto no tiene mucho xdd pero le paso el user con auth()->user(). Esto es sobre todo para que salga el nombrecito y quede chuli
        return view('home', [
            'user' => auth()->user()
        ]);
    }
}
