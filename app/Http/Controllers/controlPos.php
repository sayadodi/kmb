<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\modelHistoriVendor;
use App\Models\modelDetailBarangpo;
use App\Models\modelDetailTamu;
use App\Models\modelKendaraan;
use App\Models\modelDetailPengaturan;
use App\Models\modelPengiriman;
use App\Models\modelAprrove;
use App\Models\modelSimip;

use Validator;
use DB;
class controlPos extends Controller
{
    public function barangmasuk(){
        $kiriman = DB::table('tbpengiriman as p')->join('tbvendor as v','p.kodevendor','=','v.kdvendor')->where('statuskiriman','Diterima Gudang')->get();
        return view('pos.barangmasuk',compact('kiriman'));
    }

    public function tamu(){
        return view('pos.tamu');
    }

    public function simip(){
        $data = modelSimip::all();
        return view('pos.simip',compact('data'));
    }

    public function tambahsimip(Request $r){
        $s = new modelSimip();
        $s->kepentingan = ucfirst($r->kepentingan);
        $s->tglsimip = date("Y-m-d H:i:s");
        $s->save();

        $id = $s->idtamu;
        return \Response::json(array('id' => $id));
    }

    public function atursimip($id){
        $data = modelSimip::findOrFail($id);
        return view('pos.tambahsimip',compact('data','id'));
    }

    public function detailbarangmasuk($id){
        $kiriman = DB::table('tbpengiriman as p')->join('tbvendor as v','p.kodevendor','=','v.kdvendor')->where('p.kodekirim',$id)->get()->first();
        $status = modelHistoriVendor::where('idkirim',$id)->orderBy('idhistoriv','desc')->first();
        $jmlbarang = modelDetailBarangpo::where('idkirim',$id)->where('jenisbarang','PO')->count();
        $jmlbawa = modelDetailTamu::where('idtamu',$id)->where('jenis','Pengiriman')->count();
        $jmltools = modelDetailBarangpo::where('idkirim',$id)->where('jenisbarang','NonPO')->count();
        $jmlken = modelKendaraan::where('idtamu',$id)->count();

        return view('pos.detailbarangmasuk',compact('kiriman','id','status','jmlbarang','jmlbawa','jmltools','jmlken'));
    }

    public function databarangpo($id){
        $data = modelDetailBarangpo::where('idkirim',$id)->get();
        return view('pos.include.daftarbarangpo',compact('data','id'));
    }

    public function datapembawa($id){
        $data = modelDetailTamu::where('idtamu',$id)->where('jenis','Pengiriman')->get();
        return view('pos.include.daftarpembawabarang',compact('data','id'));
    }

    public function datakendaraan($id){
        $data = modelKendaraan::where('idtamu',$id)->where('jenis','Pengiriman')->get();
        return view('pos.include.daftarkendaraan',compact('data','id'));
    }

    public function ubahnopass(Request $r){
        $id = $r->kode;
        $s = modelDetailTamu::findOrFail($id);
        $s->nopass = $r->no;
        $s->save();

        return \Response::json($id);
    }

    public function simpanfoto(Request $r){
        $id = $r->idikut;
        $input = $r->all();
        $validator = Validator::make($input,[
                'idikut' => 'required',
                'namafoto' => 'required',
        ]);

        if ($validator->fails()) {
            return \Response::json(array('errors' => $validator->getMessageBag()->toarray()));
        }

        if (!empty($r->namafoto)) {
            $encoded_data = $r->namafoto;
            $binary_data = base64_decode($encoded_data);
            $tempat = public_path("tamu");
            $namafoto = "tamu".date("Ymdhis").".png";
            file_put_contents($tempat."/".$namafoto, $binary_data);
        }else{
            $namafoto = "";
        }
        

        $s = modelDetailTamu::findOrFail($id);
        $s->fototamu = $namafoto;
        $s->save();

        return \Response::json($s);
    }

    public function terimabarang(Request $r){
        $id = $r->idkirim;
        $s = modelPengiriman::findOrFail($id);
        $s->statuskiriman = "Diterima Pos";
        $s->tglmasuk = date("Y-m-d H:i:s");
        $s->pos = session('idkaryawan');
        $s->save();
        return \Response::json($s);
    }

    public function historiapprove($id){
        $kiriman = DB::table('tbpengiriman as p')->join('tbvendor as v','p.kodevendor','=','v.kdvendor')->where('p.kodekirim',$id)->get()->first();
        $idatur = $kiriman->idpengaturan;
        $pengaturan = DB::table('tbpengaturan as pe')->join('tbdetailpengaturan as dp','pe.kodeatur','=','dp.idatur')->where('pe.kodeatur',$idatur)->get();
        $aprrover = modelAprrove::where('jenisapprove','Barang')->where('idpengiriman',$id)->first();
        $idapprove = $aprrover->idapprove;
        return view('pos.include.historiapprove',compact('kiriman','pengaturan','idapprove'));
    }

    public function tombol($id){
        $kiriman = DB::table('tbpengiriman as p')->join('tbvendor as v','p.kodevendor','=','v.kdvendor')->where('p.kodekirim',$id)->get()->first();
        $idatur = $kiriman->idpengaturan;
        $pengaturan = DB::table('tbpengaturan as pe')->join('tbdetailpengaturan as dp','pe.kodeatur','=','dp.idatur')->where('pe.kodeatur',$idatur)->get();
        $aprrover = modelAprrove::where('jenisapprove','Barang')->where('idpengiriman',$id)->first();
        $idapprove = $aprrover->idapprove;
        return view('pos.include.tombol',compact('kiriman','pengaturan','idapprove'));
    }

    public function daftartamu($id){
        $data = modelDetailTamu::where('idtamu',$id)->where('jenis','Pengiriman')->get();
        return view('pos.include.daftartamusimip',compact('data','id'));
    }

    public function daftarkend($id){
        $data = modelKendaraan::where('idtamu',$id)->where('jenis','Pengiriman')->get();
        return view('pos.include.daftarkendaraansimip',compact('data','id'));
    }

}
