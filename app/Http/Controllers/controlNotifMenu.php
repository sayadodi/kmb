<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\modelMasterVendor;
use App\Models\modelPengiriman;
use App\Models\modelDetailBarangpo;
use App\Models\modelDetailTamu;
use App\Models\modelKendaraan;
use App\Models\modelDetailApprove;
use App\Models\modelAprrove;
use App\Models\modelKaryawan;
use App\Models\modelJabatan;
use App\Models\modelDetailPengaturan;
use DB;

class controlNotifMenu extends Controller
{
    public static function jmlvendor(){
        $vendor = modelMasterVendor::where('status','Meminta')->count();
    	return $vendor; 
    }

    public static function jmlkiriman(){
        $vendor = modelPengiriman::where('statuskiriman','Meminta Gudang')->count();
    	return $vendor; 
    }

    public static function jmlmasuk(){
        $vendor = modelPengiriman::where('statuskiriman','Diterima Gudang')->count();
    	return $vendor; 
    }

    public static function sudahapprove($id,$idapprove){
        $data = modelDetailApprove::where('idjabatan',$id)->where('idapprove',$idapprove)->count();
    	return $data; 
    }

    public static function cekapprove($id,$idapprove){
        $data = modelDetailApprove::where('idapprove', $idapprove)->count();

    }

    public static function carinamakaryawan($id){
        $k = modelKaryawan::findOrFail($id)->first();
        return $k->namaKaryawan;
    }

    public static function carinamajabatan($id){
        $j = modelJabatan::findOrFail($id);
        return $j->jabatan;
    }

    public function coba($idjabatan,$jenis,$pengaturan){
        $i = 0;
        $cari = modelAprrove::where('status','Proses')->where('jenisapprove',$jenis)->get();
        $jmlatur = modelDetailPengaturan::where('idatur',$pengaturan)->where('kodejabatan',$idjabatan)->count();
        $urutan = modelDetailPengaturan::where('idatur',$pengaturan)->where('kodejabatan',$idjabatan)->first();
        $u = $urutan->urutan;

        foreach($cari as $a){
            $q = modelDetailApprove::where('idapprove',$a->idapprove)->where('idjabatan',$idjabatan)->count();
            if($q < $jmlatur){
               $j = modelDetailPengaturan::where('idatur',$pengaturan)->where('urutan',$u)->where('kodejabatan',$idjabatan)->count();
                if($j > 0){
                 $i += 1;
                }
            }
            
        }
        echo $i;
    }
}
