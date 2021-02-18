<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\modelKeluar;
use App\Models\modelDetailKeluar;

class controlKeluar extends Controller
{
    public function barangkeluar(){
        return view('keluar.daftarkeluar');
    }

    public function datadaftarpengeluaran(){
        $data = modelKeluar::where('status','Mengatur')->get();
        return view('keluar.include.datakeluar',compact('data'));
    }

    public function tambah(Request $r){
        $keperluan = $r->keperluan;
        $s = new modelKeluar();
        $s->keperluan = $keperluan;
        $s->tujuan = $r->tujuan;
        $s->jenisbarang = $r->jenis;
        $s->tgl = date("Y-m-d H:i:s");
        $s->save();
        $id = $s->idkeluar;
        return \Response::json(array('id' => $id));
    }

    public function detailkeluar($id){
        $data = modelKeluar::where('idkeluar',$id)->get()->first();
        return view('keluar.detailkeluar',compact('data','id'));
    }

    public function daftarbarangkeluar($id){
        $data = 
    }

}
