<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\modelSimip;
use App\Models\modelAprrove;
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

    public static function approversimip($idtamu){
        $id = modelSimip::where('idpengiriman',$idtamu)->get()->first();
        $idp = $id->idpengaturan;
        $caria = modelAprrove::where('idsimip',$id->idtamu)->get()->first();
        $ida = $caria->idapprove;
        $next = DB::select("SELECT cariurutan($ida,$idp)AS kodejab")[0]->kodejab;
        if($next == "0"){
            if(!empty($id->k3) && empty($id->sk3)){
                $karyawan = DB::table('daftarkaryawan')->where('idKaryawan',$id->k3)->get()->first();
                $kembali = "Menunggu ".$karyawan->namaKaryawan;
            }else if(empty($id->smanager)){
                $karyawan = DB::table('daftarkaryawan')->where('idKaryawan',$id->manager)->get()->first();
                $kembali = "Menunggu ".$karyawan->namaKaryawan;
            }else{
                $kembali = "Selesai";
            }
        }else{
            $karyawan = DB::table('daftarkaryawan')->where('idJabatan',$next)->get()->first();
            $kembali = "Menunggu ".$karyawan->namaKaryawan;
        }

        return $kembali;
    }
}
