<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\modelTamu;
use App\Models\modelSimip;
use DB;


class controlCetak extends Controller
{
    public function tamu($id){
        $tamu = modelTamu::where('kodetamu',$id)->get()->first();
        $pembawa = DB::table('tbhistoritamu as h')->join('tbdetailtamu as d','h.iddetailtamu','=','d.iddetailtamu')->select('d.*','h.idhistori','h.nopass','h.nopassa')->where('h.idtamu',$id)->where('h.jenis','Tamu')->first();
        return view('cetak.tamu',compact('tamu','pembawa','id'));
    }

    public function simip($id){
        $simip = modelSimip::where('idtamu',$id)->get()->first();
        $orang = DB::table('tbhistoritamu as h')->join('tbdetailtamu as d','h.iddetailtamu','=','d.iddetailtamu')->select('d.*','h.idhistori','h.nopass','h.nopassa')->where('h.idtamu',$id)->where('h.jenis','Simip')->get();
        $kendaraan = DB::table('tbhistorikendaraan as h')->join('tbkendaraan as k','h.idkendaraan','=','k.idkendaraan')->select('k.*','h.idhistorikend','h.nogate')->where('h.idtamu',$id)->where('h.jenis','Simip')->get();
        return view('cetak.simip',compact('id','simip','orang','kendaraan'));
    }
}
