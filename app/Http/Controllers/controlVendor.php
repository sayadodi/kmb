<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\modelMasterVendor;
use App\Models\modelPengiriman;
use App\Models\modelDetailBarangpo;
use App\Models\modelDetailTamu;
use App\Models\modelKendaraan;


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
        $data = modelDetailTamu::where('idtamu',$id)->where('jenis','Pengiriman')->get();
        return view('vendor.include.daftarpembawabarang',compact('data','id','jenis'));
    }

    public function datakendaraan($jenis,$id){
        $data = modelKendaraan::where('idtamu',$id)->where('jenis','Pengiriman')->get();
        return view('vendor.include.daftarkendaraan',compact('data','id','jenis'));
    }

    public function datatujuan($jenis,$id){
        $data = modelPengiriman::where('kodekirim',$id)->get()->first();
        return view('vendor.include.keterangankirim',compact('data','id','jenis'));
    }

    public function ketsamping($id){
        $data = modelPengiriman::findOrFail($id)->first();
        $jmlbarang = modelDetailBarangpo::where('idkirim',$id)->where('jenisbarang','PO')->count();
        $jmlbawa = modelDetailTamu::where('idtamu',$id)->where('jenis','Pengiriman')->count();
        $jmltools = modelDetailBarangpo::where('idkirim',$id)->where('jenisbarang','NonPO')->count();
        $jmlken = modelKendaraan::where('idtamu',$id)->count();

        return view('vendor.include.keterangansamping',compact('data','id','jmlbarang','jmlbawa','jmltools','jmlken'));
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

    public function kirimbarang($jenis,$id){
        $data = modelPengiriman::findOrFail($id);
        return view('vendor.kirimbarang',compact('data','id','jenis'));
    }

    public function simpanbarangpo(Request $r){
        $s = new modelDetailBarangpo();
        $s->kodebarang = "1";
        $s->namabarang = $r->namabarang;
        $s->idkirim = $r->idkirim;
        $s->satuan = $r->satuan;
        $s->jumlahbarang = $r->jumlah;
        $s->jenisbarang = $r->jenisb;
        $s->keterangan = $r->keterangan;
        $s->statusbarang = 'Baru';
        $s->fotobarang = "foto";
        $s->save();

        return \Response::json($s);
    }

    public function simpanpembawa(Request $r){
        $s = new modelDetailTamu();
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

    public function simpankendaraan(Request $r){
        $s = new modelKendaraan();
        $s->jeniskendaraan = $r->jenisk;
        $s->namakendaraan = $r->namak;
        $s->plat = $r->plat;
        $s->jenis = "Pengiriman";
        $s->idtamu = $r->idkirim;
        $s->save();

        return \Response::json($s);
    }   
    
    public function simpantujuan(Request $r){
        $id = $r->idkirim;
        $s = modelPengiriman::findOrFail($id);
        $s->tglkirim = $r->tanggalkirim;
        $s->tujuan = $r->tujuan;
        $s->berkas = $r->kelengkapan;
        $s->save();

        return \Response::json($s);
    }  

    public function kirimpengiriman(Request $r){
        $id = $r->idkirim;
        $s = modelPengiriman::findOrFail($id);
        $s->statuskiriman = "Meminta Gudang";
        $s->save();

        return \Response::json($s);
    }  
}
