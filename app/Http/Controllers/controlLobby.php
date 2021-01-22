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
        return view('lobby.hasilscan', compact('tamu','kend','id'));
    }

    public function ubahnopassa(Request $r){
        $id = $r->kode;
        $s = modelDetailTamu::findOrFail($id);
        $s->nopassa = $r->no;
        $s->save();

        return \Response::json($s);
    }

    public function ubahgatepass(Request $r){
        $id = $r->kode;
        $s = modelKendaraan::findOrFail($id);
        $s->nogate = $r->no;
        $s->save();

        return \Response::json($s);
    }
}
