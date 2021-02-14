<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\modelMasterVendor;
use App\Models\modelPengiriman;
use App\Models\modelTamu;
use App\Models\modelSimip;
use App\Models\modelDetailBarangpo;
use App\Models\modelDetailTamu;
use App\Models\modelKendaraan;
use App\Models\modelDetailApprove;
use App\Models\modelAprrove;
use App\Models\modelKaryawan;
use App\Models\modelJabatan;
use App\Models\modelDetailPengaturan;
use App\Models\modelHak;
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

    public static function jmltamumasuk($tabel){
        if($tabel == "tamu"){
            $jml = modelTamu::whereNull('tglkeluar')->count();
        }elseif($tabel == "simip"){
            $jml = modelSimip::whereNull('tglkeluar')->count();
        }elseif($tabel == "pengiriman"){
            $jml = modelPengiriman::whereNull('tglkeluar')->count();
        }else{
            $jml = 0;
        }
    	return $jml;
    }

    public static function infotamu($id,$tabel){
        if($tabel == "tamu"){
            $data = DB::table('tbhistoritamu as h')->join('tbdetailtamu as d','h.iddetailtamu','=','d.iddetailtamu')->select('d.*','h.idhistori','h.nopass','h.nopassa')->where('h.idtamu',$id)->where('h.jenis','Tamu')->first();
            if($data){
                $nama = $data->namatamu;
                $nopassa = $data->nopassa;
                $nopass = $data->nopass;
            }else{
                $nama = "";
                $nopass = "";
                $nopassa = "";

            }
            
        }elseif($tabel == "simip"){
            $data = DB::table('tbhistoritamu as h')->join('tbdetailtamu as d','h.iddetailtamu','=','d.iddetailtamu')->select('d.*','h.idhistori','h.nopass','h.nopassa')->where('h.idtamu',$id)->where('h.jenis','Simip')->first();
            if($data){
                $nama = $data->namatamu;
                $nopass = $data->nopass;
                $nopassa = $data->nopassa;
            }else{
                $nama = "";
                $nopass = "";
                $nopassa = "";

            }
        }elseif($tabel == "pengiriman"){
            $data = DB::table('tbhistoritamu as h')->join('tbdetailtamu as d','h.iddetailtamu','=','d.iddetailtamu')->select('d.*','h.idhistori','h.nopass','h.nopassa')->where('h.idtamu',$id)->where('h.jenis','Pengiriman')->first();
            if($data){
                $nama = $data->namatamu;
                $nopassa = $data->nopassa;
                $nopass = $data->nopass;
            }else{
                $nama = "";
                $nopass = "";
                $nopassa = "";

            }
        }else{
            $jml = 0;
        }

        if(!empty($nopass)){
            $np = "[B".$nopass."]";
        }else{
            $np = "";
        }

        if(!empty($nopassa)){
            $npa = "[A".$nopassa."]";
        }else{
            $npa = "";
        }
    	return $nama.$np.$npa;
    }

    public static function sudahapprove($id,$idapprove){
        $data = modelDetailApprove::where('idjabatan',$id)->where('idapprove',$idapprove)->count();
    	return $data; 
    }

    public static function cekapprove($id,$idapprove){
        $data = modelDetailApprove::where('idapprove', $idapprove)->count();

    }

    public static function carinamakaryawan($id){
        $k = modelKaryawan::where('idKaryawan',$id)->get()->first();
        return $k->namaKaryawan;
    }

    public static function carinamajabatan($id){
        $j = modelJabatan::findOrFail($id);
        return $j->jabatan;
    }

    public static function carihak($id){
        $jab = modelHak::where('idjabatan',$id)->get()->first();
        if($jab){
            $admin = $jab->admin;
            $pos = $jab->pos;
            $gudang = $jab->gudang;
            $approver = $jab->approver;         
            $data = $admin.$gudang.$pos.$approver;
        }else{
            $data = "";
        }
        
        return $data;
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
