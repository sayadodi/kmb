<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\modelMasterVendor;

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

    public function kirimbarang(){
        return view('vendor.kirimbarang');
    }
}
