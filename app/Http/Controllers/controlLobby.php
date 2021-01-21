<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\modelPengiriman;
use App\Models\modelDetailTamu;
use App\Models\modelKendaraan;


class controlLobby extends Controller
{
    public function scan(){
        return view('lobby.scan');
    }

    public function cariscan($id){
        $tamu = modelDetailTamu::where('idtamu',$id)->where('jenis','Pengiriman')->get();
        $kend = modelKendaraan::where('idtamu',$id)->where('jenis','Pengiriman')->get();
        return view('lobby.hasilscan', compact('tamu','kend'));
    }
}
