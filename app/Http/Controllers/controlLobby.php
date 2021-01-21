<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\modelPengiriman;


class controlLobby extends Controller
{
    public function scan(){
        return view('lobby.scan');
    }

    public function cariscan($id){
         $h = modelPengiriman::where('kodekirim',$id)->first();
         return \Response::json($h);
    }
}
