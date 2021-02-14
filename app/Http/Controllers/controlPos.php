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
use App\Models\modelKaryawan;
use App\Models\modelTamu;
use App\Models\modelHistoriTamu;
use App\Models\modelHistoriKendaraan;

use Validator;
use DB;
class controlPos extends Controller
{
    public function barangmasuk(){
        $kiriman = DB::table('tbpengiriman as p')->join('tbvendor as v','p.kodevendor','=','v.kdvendor')->where('statuskiriman','Diterima Gudang')->get();
        return view('pos.barangmasuk',compact('kiriman'));
    }

    public function daftartamupos(){
        $data = modelTamu::whereNull('tglkeluar')->get();
        return view('pos.daftartamu',compact('data'));
    }

    public function tamu(){
        return view('pos.tamu');
    }

    public function simip(){
        $data = modelSimip::whereNull('idpengiriman')->get();
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
        $man = DB::table('daftarmansimip')->get();
        return view('pos.tambahsimip',compact('data','id','man'));
    }

    public function detailbarangmasuk($id){
        $kiriman = DB::table('tbpengiriman as p')->join('tbvendor as v','p.kodevendor','=','v.kdvendor')->where('p.kodekirim',$id)->get()->first();
        $status = modelHistoriVendor::where('idkirim',$id)->orderBy('idhistoriv','desc')->first();
        $jmlbarang = modelDetailBarangpo::where('idkirim',$id)->where('jenisbarang','PO')->count();
        $jmlbawa = modelHistoriTamu::where('idtamu',$id)->where('jenis','Pengiriman')->count();
        $jmltools = modelDetailBarangpo::where('idkirim',$id)->where('jenisbarang','NonPO')->count();
        $jmlken = modelHistoriKendaraan::where('idtamu',$id)->where('jenis','Pengiriman')->count();

        return view('pos.detailbarangmasuk',compact('kiriman','id','status','jmlbarang','jmlbawa','jmltools','jmlken'));
    }

    public function databarangpo($id){
        $data = modelDetailBarangpo::where('idkirim',$id)->get();
        return view('pos.include.daftarbarangpo',compact('data','id'));
    }

    public function datapembawa($id){
        $data = DB::table('tbhistoritamu as h')->join('tbdetailtamu as d','h.iddetailtamu','=','d.iddetailtamu')->select('d.*','h.idhistori','h.nopass','h.nopassa')->where('h.idtamu',$id)->where('h.jenis','Pengiriman')->get();
        $kiriman = modelPengiriman::where('kodekirim',$id)->get()->first();
        return view('pos.include.daftarpembawabarang',compact('data','id','kiriman'));
    }

    public function datakendaraan($id){
        $data = DB::table('tbhistorikendaraan as h')->join('tbkendaraan as k','h.idkendaraan','=','k.idkendaraan')->select('k.*','h.idhistorikend','h.nogate')->where('h.idtamu',$id)->where('h.jenis','Pengiriman')->get();
        $kiriman = DB::table('tbsimip as s')->join('tbpengiriman as p','s.idpengiriman','=','p.kodekirim')->where('s.idpengiriman',$id)->get()->first();

        return view('pos.include.daftarkendaraan',compact('data','id','kiriman'));
    }

    public function ubahnopass(Request $r){
        $id = $r->kode;
        $s = modelHistoriTamu::findOrFail($id);
        $s->nopass = $r->no;
        $s->save();

        return \Response::json($id);
    }
    public function ubahnopassa(Request $r){
        $id = $r->kode;
        $s = modelHistoriTamu::findOrFail($id);
        $s->nopassa = $r->no;
        $s->save();

        return \Response::json($s);
    }

    public function ubahgatepass(Request $r){
        $id = $r->kode;
        $s = modelHistoriKendaraan::findOrFail($id);
        $s->nogate = $r->no;
        $s->save();

        return \Response::json($s);
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

    public function historiapprovesimip($id){
        $kiriman = DB::table('tbsimip')->where('idpengiriman',$id)->get()->first();
        $idatur = $kiriman->idpengaturan;
        $pengaturan = DB::table('tbpengaturan as pe')->join('tbdetailpengaturan as dp','pe.kodeatur','=','dp.idatur')->where('pe.kodeatur',$idatur)->get();
        $aprrover = modelAprrove::where('jenisapprove','Simip')->where('idsimip',$id)->first();
        $idapprove = $aprrover->idapprove;
        return view('pos.include.historiapprovesimip',compact('kiriman','pengaturan','idapprove'));
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
        $data = DB::table('tbhistoritamu as h')->join('tbdetailtamu as d','h.iddetailtamu','=','d.iddetailtamu')->select('d.*','h.idhistori','h.nopass','h.nopassa')->where('h.idtamu',$id)->where('h.jenis','Simip')->get();
        return view('pos.include.daftartamusimip',compact('data','id'));
    }

    public function daftarkend($id){
        $data = DB::table('tbhistorikendaraan as h')->join('tbkendaraan as k','h.idkendaraan','=','k.idkendaraan')->select('k.*','h.idhistorikend','h.nogate')->where('h.idtamu',$id)->where('h.jenis','Simip')->get();
        return view('pos.include.daftarkendaraansimip',compact('data','id'));
    }

    public function tamupernahmasuk(Request $r){
        if ($r->has('q')) {
            $cari = $r->q;
            $data = modelDetailTamu::where('namatamu', 'LIKE', "%$cari%")->get();
            return response()->json($data);
        }
    }

    public function karyawantamu(Request $r){
        if ($r->has('q')) {
            $cari = $r->q;
            $data = modelKaryawan::where('namaKaryawan', 'LIKE', "%$cari%")->get();
            return response()->json($data);
        }
    }

    public function carihistoritamu($id){
        $d = modelDetailTamu::findOrFail($id);
        return \Response::json($d);
    }

    public function penentuansimip($id){
        $data = DB::table('tbpengiriman as p')->leftJoin('tbsimip as s','p.kodekirim','=','s.idpengiriman')->where('p.kodekirim',$id)->get()->first();
        return view('pos.include.penentuansimip',compact('id','data'));
    }

    public function p1(Request $r){
        $id = $r->idkirim;
        $p1 = $r->p1;
        $cm = DB::table('daftarmansimip')->where('jabatan','LIKE','%LOGISTIK%')->get()->first();
        $m = $cm->idKaryawan;
        $s = modelPengiriman::findOrFail($id);
        
        if($p1 == 'Y'){
            $s->areakhusus = 'Y';
            $simip = new modelSimip();
            $simip->kepentingan = "Pengiriman Barang";
            $simip->tglsimip = date("Y-m-d H:i:s");         
            $simip->statuspossimip = "Diterima";
            $simip->idpengiriman = $id;
            $simip->manager = $m;
            $simip->save();
            $idsimip = $simip->idtamu;

            $a = new modelAprrove();
            $a->tglapprove = date("Y-m-d H:i:s");
            $a->jenisapprove = "Simip";
            $a->idsimip = $idsimip;
            $a->status = "Proses";
            $a->save();
        }elseif($p1 == 'N'){
            $s->areakhusus = 'N';
        }else{

        }
        $s->save();
        return \Response::json($s);
    }

    public function p2(Request $r){
        $id = $r->idkirim;
        $p2 = $r->p2;
        $ck3 = DB::table('daftarmansimip')->where('jabatan','LIKE','%K3%')->get()->first();
        $k3 = $ck3->idKaryawan;
        $simip = modelSimip::where('idpengiriman',$id)->get()->first();
        if($p2 == 'Y'){
            $simip->k3 = $k3;
            $simip->pendamping = "Gudang";
            $simip->kendaraan = "Roda 4";
        }elseif($p2 == 'N'){  
            $simip->pendamping = "Gudang";
            $simip->kendaraan = "Roda 4";
        }else{

        }
        $simip->save();
        return \Response::json($simip);
    }

    public function langkah($id){
        $kiriman = modelPengiriman::where('kodekirim',$id)->get()->first();
        $tamu = modelHistoriTamu::where('jenis','Pengiriman')->where('idtamu',$id)->whereNull('nopass')->whereNull('nopassa')->count();
        $foto = DB::table('tbhistoritamu as h')->join('tbdetailtamu as d','h.iddetailtamu','=','d.iddetailtamu')->select('d.fototamu')->where('h.idtamu',$id)->whereNull('d.fototamu')->count();
        $kend = modelHistoriKendaraan::where('jenis','Pengiriman')->where('idtamu',$id)->whereNull('nogate')->count();
        return view('pos.include.langkah',compact('kiriman','id','tamu','foto','kend'));
    }

    public function simpantamu(Request $r){
        $baru = $r->baru;
        if (!empty($r->namafoto)) {
            $encoded_data = $r->namafoto;
            $binary_data = base64_decode($encoded_data);
            $tempat = public_path("tamu");
            $namafoto = "tamu".date("Ymdhis").".png";
            file_put_contents($tempat."/".$namafoto, $binary_data);
        }else{
            $namafoto = "";
        }
        
        $tamu = new modelTamu();
        $tamu->keperluan = $r->kepentingan;
        $tamu->perusahaan = $r->perusahaan;
        $tamu->tglmasuk = date("Y-m-d H:i:s");
        $tamu->janji = $r->janji;
        $tamu->bertemu = $r->keperluan;
        $tamu->kendaraan = $r->jenisk;
        $tamu->noplat = $r->noplat;
        $tamu->kodepos = session('idkaryawan');
        $tamu->bertemu = $r->carikaryawan;
        $tamu->save();
        $idtamu = $tamu->kodetamu;
        if($baru == "baru"){
            $dtamu = new modelDetailTamu();
            $dtamu->namatamu = $r->nama;
            $dtamu->pengenal = $r->pengenal;
            $dtamu->nopengenal = $r->nopengenal;
            $dtamu->jabatan = $r->pekerjaan;
            $dtamu->notlptamu = $r->telp;
            $dtamu->alamattamu = $r->alamat;
            $dtamu->fototamu = $namafoto;
            $dtamu->save();
            $iddtamu = $dtamu->iddetailtamu;

            $htamu = new modelHistoriTamu();
            $htamu->iddetailtamu = $iddtamu;
            $htamu->idtamu = $idtamu;
            $htamu->jenis = "Tamu";
            $htamu->tgltamu = date("Y-m-d H:i:s");
            $htamu->nopass = $r->nopass;
            $htamu->save();
        }elseif($baru == "pernah"){
            $iddtamu = $r->caritamu;
            $htamu = new modelHistoriTamu();
            $htamu->iddetailtamu = $iddtamu;
            $htamu->idtamu = $idtamu;
            $htamu->jenis = "Tamu";
            $htamu->tgltamu = date("Y-m-d H:i:s");
            $htamu->nopass = $r->nopass;
            $htamu->save();
        }

        return \Response::json($idtamu);
    }

    public function simpantamusimip(Request $r,$id){
        $baru = $r->baru;
        if (!empty($r->namafoto)) {
            $encoded_data = $r->namafoto;
            $binary_data = base64_decode($encoded_data);
            $tempat = public_path("tamu");
            $namafoto = "tamu".date("Ymdhis").".png";
            file_put_contents($tempat."/".$namafoto, $binary_data);
        }else{
            $namafoto = "";
        }
        if($baru == "baru"){
            $dtamu = new modelDetailTamu();
            $dtamu->namatamu = $r->nama;
            $dtamu->pengenal = $r->pengenal;
            $dtamu->nopengenal = $r->nopengenal;
            $dtamu->jabatan = $r->pekerjaan;
            $dtamu->notlptamu = $r->telp;
            $dtamu->alamattamu = $r->alamat;
            $dtamu->fototamu = $namafoto;
            $dtamu->save();
            $iddtamu = $dtamu->iddetailtamu;

            $htamu = new modelHistoriTamu();
            $htamu->iddetailtamu = $iddtamu;
            $htamu->idtamu = $id;
            $htamu->jenis = "Simip";
            $htamu->tgltamu = date("Y-m-d H:i:s");
            $htamu->nopass = $r->nopass;
            $htamu->save();
        }elseif($baru == "pernah"){
            $iddtamu = $r->caritamu;
            $htamu = new modelHistoriTamu();
            $htamu->iddetailtamu = $iddtamu;
            $htamu->idtamu = $id;
            $htamu->jenis = "Simip";
            $htamu->tgltamu = date("Y-m-d H:i:s");
            $htamu->nopass = $r->nopass;
            $htamu->save();
        }

        return \Response::json($htamu);
    }

    public function simpankendaraansimip(Request $r,$id){
        $s = new modelKendaraan();
        $s->jeniskendaraan = $r->jenisk;
        $s->namakendaraan = $r->namak;
        $s->plat = $r->plat;
        $s->save();
        $idkend = $s->idkendaraan;
        

        $h = new modelHistoriKendaraan();
        $h->idkendaraan = $idkend;
        $h->idtamu = $id;
        $h->jenis = "Simip";
        $h->tglmasuk = date("Y-m-d H:i:s");
        $h->save();

        return \Response::json($h);
    }

    public function akhirsimip(Request $r, $id){
        $jmlken = modelHistoriKendaraan::where('idtamu',$id)->where('jenis','Simip')->count();
        $idk3 = DB::table('daftarmansimip')->where('jabatan','LIKE','%K3%')->get()->first();
        
        $s = modelSimip::findOrFail($id);
        $s->tujuan = $r->tujuan;
        $s->pendamping = $r->pendamping;
        $s->statuspossimip = "Diterima";
        $s->manager = $r->manajer;
        $s->perusahaan = $r->perusahaan;
        if($jmlken > 0){
            $s->k3 = $idk3->idKaryawan;
        }
        $s->save();

        $a = new modelAprrove();
        $a->tglapprove = date("Y-m-d H:i:s");
        $a->jenisapprove = "Simip";
        $a->idsimip = $id;
        $a->status = "Proses";
        $a->save();

        return \Response::json($s);
    }

    public function keluarkan(){
        $tamu = modelTamu::whereNull('tglkeluar')->get();
        $simip = modelSimip::whereNull('tglkeluar')->whereNull('idpengiriman')->get();
        $kirim = modelPengiriman::whereNull('tglkeluar')->get();
        return view('pos.keluarkan',compact('tamu','simip','kirim'));
    }

    public function keluar($tabel,$id){
        if($tabel == "tamu"){
            $d = modelTamu::findOrFail($id);
            $d->tglkeluar = date("Y-m-d H:i:s");
        }elseif($tabel == "simip"){
            $d = modelSimip::findOrFail($id);
            $d->tglkeluar = date("Y-m-d H:i:s");

        }elseif($tabel == "pengiriman"){
            $d = modelPengiriman::findOrFail($id);
            $d->tglkeluar = date("Y-m-d H:i:s");

        }else{
            
        }
        $d->save();
        return redirect('keluarkan');
    }

    public function menungguapprover(){
        $kiriman = DB::table('tbpengiriman as p')->join('tbvendor as v','p.kodevendor','=','v.kdvendor')->join('tbapprove as a','p.kodekirim','=','a.idpengiriman')->select('p.*','v.namavendor','a.idapprove')->where('statuskiriman','Diterima Pos')->orWhere('statuskiriman','Proses Approve')->get();
        return view('pos.menungguapprover',compact('kiriman'));
    }
    
}
