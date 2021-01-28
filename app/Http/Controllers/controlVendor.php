<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\modelMasterVendor;
use App\Models\modelPengiriman;
use App\Models\modelDetailBarangpo;
use App\Models\modelDetailTamu;
use App\Models\modelKendaraan;
use App\Models\modelHistoriVendor;
use App\Models\modelHistoriTamu;
use App\Models\modelHistoriKendaraan;
use DB;


use Validator;

class controlVendor extends Controller
{
    public function login(){
        return view('vendor.login');
    }

    public function posLogin(Request $request){
    	$user = $request->username;
    	$pass = md5($request->password);

    	$check = modelMasterVendor::where('email',$user)->where('password',$pass)->where('status','Aktif')->count();
    	if(!($check > 0)){
            \Alert::error('Login gagal', 'Peringatan')->autoClose(2000);
    		return redirect('loginvendor')->with('status','salah');
    	}

        $c = modelMasterVendor::where('email',$user)->where('password',$pass)->where('status','Aktif')->first();
        session(['idvendor'=>$c->kdvendor]);
        session(['nama'=>$c->namavendor]);
        session(['jabatan'=>$c->email]);
        session(['level'=>"Vendor"]);
        \Alert::success('Login berhasil', 'Info')->autoClose(2000);
        return redirect('berandavendor');
    }

    public function logout(Request $request){
    	$request->session()->regenerate();
    	$request->session()->flush();
    	return redirect('loginvendor');
    }

    public function berandavendor(){
        return view('vendor.beranda');
    }

    public function kirimanberanda(){
        $id = session('idvendor');
        $data = modelPengiriman::where('kodevendor',$id)->where('statuskiriman','Diterima')->get();
        return view('vendor.include.kirimanberanda',compact('data'));
    }

    public function ubahpass(){
        return view('master.ubahpass');
    }

    public function storepass(Request $r){
        $pass = $r->password;
        $id = session('idvendor');
        if (empty($pass)) {
            
        }else{
            $s = modelMasterVendor::findOrfail($id);
            $s->password = md5($pass);
            $s->save();
            Session::flash('flash_message','Password anda telah diperbaharui, logout untuk melihat hasil.');
        }
        return redirect('ubahpassv');
    }

    public function daftarkiriman(){
        return view('vendor.daftarkiriman');
    }

    public function kirimnonpo (){
        return view('vendor.daftarkirimannonpo');
    }

    // Data data include ajax kiriman
    public function datadaftarkiriman(){
        $vendor = session('idvendor');
        $data = modelPengiriman::where('kodevendor',$vendor)->where('status','PO')->get();
        return view('vendor.include.daftarkiriman',compact('data'));
    }

    public function datadaftarkirimannonpo(){
        $vendor = session('idvendor');
        $data = modelPengiriman::where('kodevendor',$vendor)->where('status','NonPO')->get();
        return view('vendor.include.daftarkirimannonpo',compact('data'));
    }

    public function databarangpo($jenis,$id){
        $data = modelDetailBarangpo::where('idkirim',$id)->get();
        return view('vendor.include.daftarbarangpo',compact('data','id','jenis'));
    }

    public function datapembawa($jenis,$id){
        $data = DB::table('tbhistoritamu as h')->join('tbdetailtamu as d','h.iddetailtamu','=','d.iddetailtamu')->select('d.*','h.idhistori')->where('h.idtamu',$id)->where('h.jenis','Pengiriman')->get();
        $histori = DB::table('tbhistoritamu as h')->join('tbdetailtamu as d','h.iddetailtamu','=','d.iddetailtamu')->select('d.*','h.idhistori')->where('h.kdvendor',session('idvendor'))->where('h.jenis','Pengiriman')->get();
        return view('vendor.include.daftarpembawabarang',compact('data','id','jenis','histori'));
    }

    public function datakendaraan($jenis,$id){
        $data = DB::table('tbhistorikendaraan as h')->join('tbkendaraan as k','h.idkendaraan','=','k.idkendaraan')->select('k.*','h.idhistorikend')->where('h.idtamu',$id)->where('h.jenis','Pengiriman')->get();
        $historikend = DB::table('tbhistorikendaraan as h')->join('tbkendaraan as k','h.idkendaraan','=','k.idkendaraan')->select('k.*','h.idhistorikend')->where('h.kdvendor',session('idvendor'))->where('h.jenis','Pengiriman')->get();
        return view('vendor.include.daftarkendaraan',compact('data','id','jenis','historikend'));
    }

    public function datatujuan($jenis,$id){
        $data = modelPengiriman::where('kodekirim',$id)->get()->first();
        return view('vendor.include.keterangankirim',compact('data','id','jenis'));
    }

    public function ketsamping($id){
        $data = modelPengiriman::where('kodekirim',$id)->get()->first();
        $jmlbarang = modelDetailBarangpo::where('idkirim',$id)->where('jenisbarang','PO')->count();
        $jmlbawa = modelHistoriTamu::where('idtamu',$id)->where('jenis','Pengiriman')->count();
        $jmltools = modelDetailBarangpo::where('idkirim',$id)->where('jenisbarang','NonPO')->count();
        $jmlken = modelHistoriKendaraan::where('idtamu',$id)->where('jenis','Pengiriman')->count();
        $histori = modelHistoriVendor::where('idkirim',$id)->get();

        return view('vendor.include.keterangansamping',compact('data','id','jmlbarang','jmlbawa','jmltools','jmlken','histori'));
    }

    public function tambahpo(Request $r){
        $input = $r->all();
        $validator = Validator::make($input,[
                'nopo' => 'required',
                'keperluan' => 'required',
        ]);

        if ($validator->fails()) {
            return \Response::json(array('errors' => $validator->getMessageBag()->toarray()));
        }
        $nopo = $r->nopo;
        $simpan = new modelPengiriman();
        $simpan->nopo = $nopo;
        $simpan->keperluan = $r->keperluan;
        $simpan->tglbuat = date("Y-m-d H:i:s");
        $simpan->kodevendor = session('idvendor');
        $simpan->status = 'PO';
        $simpan->save();
        return \Response::json($simpan);
    }

    public function hapuskirimanpo($id){
        $d = modelPengiriman::findOrfail($id);
        $d->delete();
        return redirect('kirimpo');
    }

    public function tambahnonpo(Request $r){
        $input = $r->all();
        $validator = Validator::make($input,[
                'keperluan' => 'required',
        ]);

        if ($validator->fails()) {
            return \Response::json(array('errors' => $validator->getMessageBag()->toarray()));
        }
        $nopo = $r->nopo;
        $simpan = new modelPengiriman();
        $simpan->nopo = acak(6);
        $simpan->keperluan = $r->keperluan;
        $simpan->tglbuat = date("Y-m-d H:i:s");
        $simpan->status = 'NonPO';
        $simpan->kodevendor = session('idvendor');
        $simpan->save();
        return \Response::json($simpan);
    }

    public function hapuskirimannonpo($id){
        $d = modelPengiriman::findOrfail($id);
        $d->delete();
        return redirect('kirimnonpo');
    }

    public function kirimbarang($jenis,$id){
        $data = modelPengiriman::findOrFail($id);
        return view('vendor.kirimbarang',compact('data','id','jenis'));
    }

    public function simpanbarangpo(Request $r){
        $input = $r->all();
        $validator = Validator::make($input,[
            'gambar' => 'sometimes|image|max:700|mimes:jpeg,jpg,bmp,png',
        ]);
        if ($validator->fails()) {
            return \Response::json(array('errors' => $validator->getMessageBag()->toarray()));
        }

        $gambar = $r->file('gambar');
        $berkas = $r->file('berkas');
        if (!empty($berkas)) {
            $extb = $berkas->getClientOriginalExtension();
            $nama_berkas = "Berkas".date("YmdHis").".$extb";
            $tempat_berkas = "berkas";
            $r->file('berkas')->move($tempat_berkas, $nama_berkas);
        }else{
            $nama_berkas = "";
        }

        if (!empty($gambar)) {
            $extg = $gambar->getClientOriginalExtension();
            if ($r->file('gambar')->isValid()) {
                $nama_gambar = "Gambar".date("YmdHis").".$extg";
                $tempat_gambar = "gambar";
                $r->file('gambar')->move($tempat_gambar, $nama_gambar);
            }
        }else{
            $nama_gambar = "";
        }

        $s = new modelDetailBarangpo();
        $s->kodebarang = acak(6);
        $s->namabarang = $r->namabarang;
        $s->idkirim = $r->idkirim;
        $s->satuan = $r->satuan;
        $s->jumlahbarang = $r->jumlah;
        $s->jenisbarang = $r->jenisb;
        $s->keterangan = $r->keterangan;
        $s->statusbarang = 'Baru';
        $s->fotobarang = $nama_gambar;
        $s->dokumen = $nama_berkas;
        $s->save();

        return \Response::json($s);
    }

    public function ubahbarang(Request $r){
        $gambar = $r->file('gambar');
        $berkas = $r->file('berkas');
        if (!empty($berkas)) {
            $extb = $berkas->getClientOriginalExtension();
            $nama_berkas = "Berkas".date("YmdHis").".$extb";
            $tempat_berkas = "berkas";
            $r->file('berkas')->move($tempat_berkas, $nama_berkas);
        }else{
            $nama_berkas = "";
        }

        if (!empty($gambar)) {
            $extg = $gambar->getClientOriginalExtension();
            if ($r->file('gambar')->isValid()) {
                $nama_gambar = "Gambar".date("YmdHis").".$extg";
                $tempat_gambar = "gambar";
                $r->file('gambar')->move($tempat_gambar, $nama_gambar);
            }
        }else{
            $nama_gambar = "";
        }

        $s = modelDetailBarangpo::findOrFail($r->iddetail);
        $s->namabarang = $r->namabarang;
        $s->idkirim = $r->idkirim;
        $s->satuan = $r->satuan;
        $s->jumlahbarang = $r->jumlah;
        $s->jenisbarang = $r->jenisb;
        $s->keterangan = $r->keterangan;
        $s->statusbarang = 'Baru';
        if (!empty($nama_gambar)) {
            $s->fotobarang = $nama_gambar;
        }
        if (!empty($nama_berkas)) {
            $s->dokumen = $nama_berkas;
        } 
        $s->save();

        return \Response::json($s);
    }

    public function hapusbarang($id){
        $d = modelDetailBarangpo::findOrfail($id);
        $d->delete();
        return \Response::json($d);
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
        $h->idtamu = $r->idkirim;
        $h->jenis = "Pengiriman";
        $h->tgltamu = date("Y-m-d H:i:s");
        $h->kdvendor = session('idvendor');
        $h->save();

        return \Response::json($h);
    }

    public function ubahpembawa(Request $r, $id){
        $s = modelDetailTamu::findOrFail($id);
        $s->pengenal = $r->jenisp;
        $s->nopengenal = $r->nomorp;
        $s->namatamu = $r->namap;
        $s->jabatan = $r->jabp;
        $s->notlptamu = $r->kontakp;
        $s->idtamu = $r->idkirim;
        $s->jenis = "Pengiriman";
        $s->alamattamu = $r->alamat;
        $s->fototamu = "foto";
        $s->save();

        return \Response::json($s);
    }

    public function hapuspembawa($id){
        $d = modelHidtoriTamu::findOrfail($id);
        $d->delete();
        return \Response::json($d);
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
        $h->idtamu = $r->idkirim;
        $h->jenis = "Pengiriman";
        $h->tglmasuk = date("Y-m-d H:i:s");
        $h->kdvendor = session('idvendor');
        $h->save();

        return \Response::json($h);
    }   

    public function ubahkendaraan(Request $r, $id){
        $s = modelKendaraan::findOrFail($id);
        $s->jeniskendaraan = $r->jenisk;
        $s->namakendaraan = $r->namak;
        $s->plat = $r->plat;
        $s->jenis = "Pengiriman";
        $s->idtamu = $r->idkirim;
        $s->save();

        return \Response::json($s);
    }

    public function hapuskendaraan($id){
        $d = modelKendaraan::findOrfail($id);
        $d->delete();
        return \Response::json($d);
    }
    
    public function simpantujuan(Request $r){
        $id = $r->idkirim;
        $file = $r->file('kelengkapan');
        if (!empty($file)) {
            $ext = $file->getClientOriginalExtension();
            if ($r->file('kelengkapan')->isValid()) {
                $foto_nama = date("YmdHis").".$ext";
                $upload_path = "kelengkapan";
                $r->file('kelengkapan')->move($upload_path, $foto_nama);
            }
        }
        $s = modelPengiriman::findOrFail($id);
        $s->tglkirim = $r->tanggalkirim;
        $s->tujuan = $r->tujuan;
        $s->berkas = $foto_nama;
        $s->save();

        return \Response::json($s);
    }  

    public function kirimpengiriman(Request $r){
        $id = $r->idkirim;
        $s = modelPengiriman::findOrFail($id);
        $s->statuskiriman = "Meminta Gudang";
        $s->save();

        $vendor = $s->kodevendor;

        $h = new modelHistoriVendor();
        $h->kdvendor = $vendor;
        $h->tgltt = date("Y-m-d H:i:s");
        $h->alasan = "Meminta kiriman";
        $h->status = "Meminta";
        $h->keterangan = "Minta Kirim";
        $h->idkirim = $id;
        $h->save();

        return \Response::json($h);
    }  

    public function carihistoritamu($id){
        $d = modelDetailTamu::findOrFail($id);
        return \Response::json($d);
    }

    public function carihistorikend($id){
        $d = modelKendaraan::findOrFail($id);
        return \Response::json($d);
    }
}
