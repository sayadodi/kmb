<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\modelTamu;
use App\Models\modelSimip;
use App\Models\modelDetailBarangpo;
use DB;


class controlCetak extends Controller
{
    public function tamu($id){
        $tamu = modelTamu::where('kodetamu',$id)->get()->first();
        $pembawa = DB::table('tbhistoritamu as h')->join('tbdetailtamu as d','h.iddetailtamu','=','d.iddetailtamu')->select('d.*','h.idhistori','h.nopass','h.nopassa')->where('h.idtamu',$id)->where('h.jenis','Tamu')->first();
        return view('cetak.tamu',compact('tamu','pembawa','id'));
    }

    public function simip($id){
        $simip = modelSimip::where('idtamu',$id)->get()->first();
        $orang = DB::table('tbhistoritamu as h')->join('tbdetailtamu as d','h.iddetailtamu','=','d.iddetailtamu')->select('d.*','h.idhistori','h.nopass','h.nopassa')->where('h.idtamu',$id)->where('h.jenis','Simip')->get();
        $kendaraan = DB::table('tbhistorikendaraan as h')->join('tbkendaraan as k','h.idkendaraan','=','k.idkendaraan')->select('k.*','h.idhistorikend','h.nogate')->where('h.idtamu',$id)->where('h.jenis','Simip')->get();
        return view('cetak.simip',compact('id','simip','orang','kendaraan'));
    }

    public function pengiriman($id){
        $kirim = DB::table('tbpengiriman as p')->join('tbvendor as v','p.kodevendor','=','v.kdvendor')->join('tbapprove as a','p.kodekirim','=','a.idpengiriman')->select('p.*','v.namavendor','a.idapprove')->where('kodekirim',$id)->get()->first();
        $barang = modelDetailBarangpo::where('idkirim',$id)->get();
        $data = DB::table('tbhistoritamu as h')->join('tbdetailtamu as d','h.iddetailtamu','=','d.iddetailtamu')->select('d.*','h.idhistori','h.nopass','h.nopassa')->where('h.idtamu',$id)->where('h.jenis','Pengiriman')->get();

        return view('cetak.pengiriman',compact('kirim','barang','data'));
    }

    public function laporanbarangmasuk(){
        $skr = date("Y-m-d");
        $kirim = DB::table('tbdetailpengiriman as dp')->join('tbpengiriman as p','dp.idkirim','=','p.kodekirim')->where('tglmasuk','LIKE',"%$skr%")->get();
        return view('cetak.daftarbarangmasuk',compact('kirim'));

    }

    public function laporantamu(){
        $skr = date("Y-m-d");
        $data = DB::table('tbhistoritamu as h')->join('tbdetailtamu as d','h.iddetailtamu','=','d.iddetailtamu')->select('d.*','h.idhistori','h.jenis','h.tgltamu')->where('h.tgltamu','LIKE',"$skr")->get();
        return view('cetak.daftartamumasuk',compact('data'));

    }

    public function cetaklaporanbarangmasuk(Request $r){
        $tgl1 = $r->tgl1;
        $tgl2 = $r->tgl2;
        $kirim = DB::table('tbdetailpengiriman as dp')->join('tbpengiriman as p','dp.idkirim','=','p.kodekirim')->whereNotNull('tglkeluar')->whereBetween('tglkirim',[$tgl1,$tgl2])->get();
        return view('cetak.cetakdaftarbarangmasuk',compact('kirim'));

    }

    public function cetaklaporantamu(Request $r){
        $tgl1 = $r->tgl1;
        $tgl2 = $r->tgl2;
        $data = DB::table('tbhistoritamu as h')->join('tbdetailtamu as d','h.iddetailtamu','=','d.iddetailtamu')->select('d.*','h.idhistori','h.jenis','h.tgltamu')->get();
        return view('cetak.cetakdaftartamu',compact('data'));

    }
}

