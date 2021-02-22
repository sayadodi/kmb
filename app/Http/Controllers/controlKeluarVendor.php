<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\modelKeluar;
use App\Models\modelDetailKeluar;
use App\Models\modelDetailTamu;
use App\Models\modelHistoriTamu;
use App\Models\modelKendaraan;
use App\Models\modelHistoriKendaraan;
use App\Models\modelDetailBarangpo;

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

    public function daftarpembawa($id){
        $data = DB::table('tbhistoritamu as h')->join('tbdetailtamu as d','h.iddetailtamu','=','d.iddetailtamu')->select('d.*','h.idhistori','h.nopass','h.nopassa')->where('h.idtamu',$id)->where('h.jenis','Keluar')->get();
        $histori = DB::table('tbhistoritamu as h')->join('tbdetailtamu as d','h.iddetailtamu','=','d.iddetailtamu')->select('d.*','h.idhistori')->where('h.kdvendor',session('idvendor'))->where('h.jenis','Pengiriman')->orWhere('h.jenis','Keluar')->get();
        return view('vendor.include.datapembawa',compact('data','id','histori'));
    }

    public function daftarkendaraan($id){
        $data = DB::table('tbhistorikendaraan as h')->join('tbkendaraan as k','h.idkendaraan','=','k.idkendaraan')->select('k.*','h.idhistorikend')->where('h.idtamu',$id)->where('h.jenis','Pengeluaran')->get();
        $historikend = DB::table('tbhistorikendaraan as h')->join('tbkendaraan as k','h.idkendaraan','=','k.idkendaraan')->select('k.*','h.idhistorikend')->where('h.kdvendor',session('idvendor'))->where('h.jenis','Pengiriman')->orWhere('h.jenis','Pengeluaran')->get();
        $keluar = modelKeluar::where('idkeluar',$id)->select('status')->get()->first()['status'];
        
        return view('vendor.include.datakendaraan',compact('data','id','historikend','keluar'));
    }

    public function simpanpembawa(Request $r){
        $jenis = $r->baru;
        if($jenis == "baru"){
            $s = new modelDetailTamu();
            $s->pengenal = $r->jenisp;
            $s->nopengenal = $r->nomorp;
            $s->namatamu = $r->namap;
            $s->jabatan = $r->jabp;
            $s->notlptamu = $r->kontakp;
            $s->alamattamu = $r->alamat;
            $s->save();
            $id = $s->iddetailtamu;
        }else{
            $id = $r->iddetailtamu;
        }
        
        $h = new modelHistoriTamu();
        $h->iddetailtamu = $id;
        $h->idtamu = $r->idkeluar;
        $h->jenis = "Keluar";
        $h->tgltamu = date("Y-m-d H:i:s");
        $h->save();

        return \Response::json($h);
    }

    public function simpankendaraan(Request $r){
        $jenis = $r->hiskend;
        if($jenis == "baru"){
            $s = new modelKendaraan();
            $s->jeniskendaraan = $r->jenisk;
            $s->namakendaraan = $r->namak;
            $s->plat = $r->plat;
            $s->save();
            $id = $s->idkendaraan;
        }else{
            $id = $r->idkendaraan;
        }
        

        $h = new modelHistoriKendaraan();
        $h->idkendaraan = $id;
        $h->idtamu = $r->idkeluar;
        $h->jenis = "Pengeluaran";
        $h->tglmasuk = date("Y-m-d H:i:s");
        $h->kdvendor = session('idvendor');
        $h->save();

        return \Response::json($h);
    }

    public function hapus($id){
        $h = modelKeluar::where('idkeluar',$id)->get()->first();
        $h->delete();
        return redirect('daftarkeluar');
    }

    public function simpan(Request $r,$id){
        $data = $r->kdbrg;
        $pecah = explode(',',$data);
        $hitung = count($pecah);
        for($i = 0;$i<$hitung-2;$i++){
            $carib = DB::table('daftarbarangditolak')->where('kdvendor',session('idvendor'))->where('iddetailkirim',$pecah[$i])->get()->first();
            $s = new modelDetailKeluar();
            $s->idkeluar = $id;
            $s->namabarang = $carib->namabarang;
            $s->satuan = $carib->satuan;
            $s->jumlah = $carib->jumlahbarang;
            $s->fotobarang = $carib->fotobarang;
            $s->spesifikasi = $carib->keterangan;
            $s->save();
            $update = modelDetailBarangpo::where('iddetailkirim',$pecah[$i])->get()->first();
            $update->statusbarang = "Proses Return";
            $update->save();
        }

        $k = modelKeluar::where('idkeluar',$id)->get()->first();
        $k->status = "Meminta";
        $k->save();
        return \Response::json($k);
    }

}
