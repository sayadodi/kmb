<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\modelKeluar;
use App\Models\modelDetailKeluar;
use App\Models\modelDetailTamu;
use App\Models\modelHistoriTamu;
use DB;

class controlKeluarVendor extends Controller
{
    public function index(){
        return view('vendor.barangkeluar');
    }

    public function data(){
        $id = session('idvendor');
        $data = modelKeluar::where('kdvendor',$id)->get();
        return view('vendor.include.databarangkeluar',compact('data'));
    }

    public function tambah(){
        $s = new modelKeluar();
        $s->tujuan = "Unit 09";
        $s->jenisbarang = 'Kontrak';
        $s->keperluan = "Pengeluaran Barang Ditolak";
        $s->status = "Mengatur";
        $s->kdvendor = session('idvendor');
        $s->save();
        $id = $s->idkeluar;
        return redirect("daftarkeluar/".$id);
    }

    public function detail($id){
        $data = modelKeluar::where('idkeluar',$id)->get()->first();
        return view('vendor.keluarkan',compact('data','id'));
    }

    public function daftarbarangkeluar($id){
        $tolak = DB::table('daftarbarangditolak')->where('kdvendor',session('idvendor'))->get();
        return view('vendor.include.daftarbarangditolak',compact('tolak'));
    }

    public function simpanbarang(Request $r,$id){
        
    }

    public function daftarpembawa($id){
        $data = DB::table('tbhistoritamu as h')->join('tbdetailtamu as d','h.iddetailtamu','=','d.iddetailtamu')->select('d.*','h.idhistori','h.nopass','h.nopassa')->where('h.idtamu',$id)->where('h.jenis','Keluar')->get();
        return view('vendor.include.datapembawa',compact('data','id'));
    }

    public function hapus($id){
        $h = modelKeluar::where('idkeluar',$id)->get()->first();
        $h->delete();
        return redirect('daftarkeluar');
    }

}
