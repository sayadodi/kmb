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
use App\Models\modelKaryawan;
use App\Models\modelJabatan;
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

    public function coba($ida,$idp){
        $data = DB::select("SELECT cariurutan($ida, $idp)as kode");
        dd($data[0]->kode);
    }
}
