<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\modelKeluar;
use App\Models\modelDetailKeluar;
use App\Models\modelDetailTamu;
use App\Models\modelHistoriTamu;
use DB;
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
        $data = modelDetailKeluar::where('idkeluar',$id)->get();
        return view('keluar.include.databarang',compact('data','id'));
    }

    public function simpanbarang(Request $r,$id){
        $gambar = $r->file('gambar');
        $nama_gambar = "";
        if (!empty($gambar)) {
            $extg = $gambar->getClientOriginalExtension();
            if ($r->file('gambar')->isValid()) {
                $nama_gambar = "Gambar".date("YmdHis").".$extg";
                $tempat_gambar = "gambar";
                $r->file('gambar')->move($tempat_gambar, $nama_gambar);
            }
        }
        $s = new modelDetailKeluar();
        $s->idkeluar = $id;
        $s->namabarang = $r->namabarang;
        $s->satuan = $r->satuan;
        $s->jumlah = $r->jumlah;
        $s->spesifikasi = $r->keterangan;
        $s->fotobarang = $nama_gambar;
        $s->save();
        return \Response::json($s);

    }

    public function daftarpembawa($id){
        $data = DB::table('tbhistoritamu as h')->join('tbdetailtamu as d','h.iddetailtamu','=','d.iddetailtamu')->select('d.*','h.idhistori','h.nopass','h.nopassa')->where('h.idtamu',$id)->where('h.jenis','Keluar')->get();
        return view('keluar.include.datapembawa',compact('data','id'));
    }

    public function pernahmembawa(Request $r){
        if ($r->has('q')) {
            $cari = $r->q;
            $data = modelDetailTamu::where('namatamu', 'LIKE', "%$cari%")->get();
            return response()->json($data);
        }
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

    public function simpankeluar(Request $r,$id){
        $s = modelKeluar::where('idkeluar',$id)->get()->first();
        
        return \Response::json($h);
    }

    public function permintaankeluar(){
        return view('keluar.permintaan');
    }

    public function datamintakeluar(){
        $data = modelKeluar::where('status',"Meminta")->get();
        return view('keluar.include.databarangkeluar',compact('data'));
    }

    public function detailpermintaan($id){
        $data = modelKeluar::where('idkeluar',$id)->get()->first();
        return view('keluar.detailpermintaan',compact('data','id'));
    }

    public function mintabarang($id){
        $tolak = modelDetailKeluar::where('idkeluar',$id)->get();
        return view('keluar.include.daftarbarangditolak',compact('tolak','id'));
    }

    public function mintapembawa($id){
        $data = DB::table('tbhistoritamu as h')->join('tbdetailtamu as d','h.iddetailtamu','=','d.iddetailtamu')->select('d.*','h.idhistori','h.nopass','h.nopassa')->where('h.idtamu',$id)->where('h.jenis','Keluar')->get();
        return view('keluar.include.datapembawam',compact('data','id'));
    }

    public function mintakendaraan($id){
        $data = DB::table('tbhistorikendaraan as h')->join('tbkendaraan as k','h.idkendaraan','=','k.idkendaraan')->select('k.*','h.idhistorikend')->where('h.idtamu',$id)->where('h.jenis','Pengeluaran')->get();
        return view('keluar.include.datakendaraan',compact('data','id'));
    }
}
