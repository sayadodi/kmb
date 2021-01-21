<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class controlLobby extends Controller
{
    public function scan(){
        return view('lobby.scan');
    }
}
