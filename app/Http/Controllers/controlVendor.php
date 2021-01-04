<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\modelMasterVendor;
use App\Models\modelPengiriman;
use App\Models\modelDetailBarangpo;
use App\Models\modelDetailTamu;

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

    // Data data include ajax kiriman
    public function datadaftarkiriman(){
        $vendor = session('idvendor');
        $data = modelPengiriman::where('kodevendor',$vendor)->get();
        return view('vendor.include.daftarkiriman',compact('data'));
    }

    public function databarangpo(){
        return view('vendor.include.daftarbarangpo');
    }

    public function datapembawa(){
        return view('vendor.include.daftarpembawabarang');
    }

    public function datatujuan(){
        return view('vendor.include.keterangankirim');
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
        $simpan->save();
        return \Response::json($simpan);
    }

    public function kirimbarang($id){
        $data = modelPengiriman::findOrFail($id);
        return view('vendor.kirimbarang',compact('data','id'));
    }

    public function simpanbarangpo(Request $r){
        $s = new modelDetailBarangpo();
        $s->kodebarang = "1";
        $s->namabarang = $r->namabarang;
        $s->idkirim = "1";
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
        $s->namatamu = $r->namatamu;
        $s->notlptamu = $r->tlptamu;
        $s->idtamu = $r->kiriman;
        $s->jenis = "Pengiriman";
        $s->alamattamu = $r->alamattamu;
        $s->fototamu = "foto";
        $s->save();

        return \Response::json($s);
    }
}
