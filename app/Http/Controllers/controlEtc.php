<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\modelSimip;
use DB;

class controlEtc extends Controller
{
    public static function approverbarang($ida,$idp){
        $next = DB::select("SELECT cariurutan($ida,$idp)AS kodejab")[0]->kodejab;
        if($next == "0"){
            $kembali = "Selesai";
        }else{
            $karyawan = DB::table('daftarkaryawan')->where('idJabatan',$next)->get()->first();
            $kembali = "Menunggu ".$karyawan->namaKaryawan;
        }

        return $kembali;
    }

    public static function approversimip($ida,$idtamu){
        $id = modelSimip::where('idpengiriman',$idtamu)->get()->first();
        $idp = $id->idpengaturan;
        $next = DB::select("SELECT cariurutan('22',$idp)AS kodejab")[0]->kodejab;
        if($next == "0"){
            $kembali = "Selesai";
        }else{
            $karyawan = DB::table('daftarkaryawan')->where('idJabatan',$next)->get()->first();
            $kembali = "Menunggu ".$karyawan->namaKaryawan;
        }

        return $kembali;
    }
}
