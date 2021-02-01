<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
}
