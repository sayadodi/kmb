<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\modelHistoriVendor;
use App\Models\modelDetailBarangpo;
use App\Models\modelDetailTamu;
use App\Models\modelKendaraan;
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
        return view('pos.simip');
    }

    public function detailbarangmasuk($id){
        $kiriman = DB::table('tbpengiriman as p')->join('tbvendor as v','p.kodevendor','=','v.kdvendor')->where('p.kodekirim',$id)->get()->first();
        $status = modelHistoriVendor::where('idkirim',$id)->orderBy('idhistoriv','desc')->first();
        return view('pos.detailbarangmasuk',compact('kiriman','id','status'));
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
}
