<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\modelKaryawan;
use App\Models\modelHak;

class controlKaryawan extends Controller
{
    public function login(){
        return view('login');
    }

    public function postLogin(Request $request){
        $user = $request->username;
    	$pass = md5($request->password);

    	$check = modelKaryawan::where('email',$user)->where('password',$pass)->where('status','Y')->count();
    	if(!($check > 0)){
            \Alert::error('Login gagal', 'Peringatan')->autoClose(2000);
    		return redirect('login')->with('status','salah');
    	}

        $c = modelKaryawan::where('email',$user)->where('password',$pass)->where('status','Y')->first();
        $d = modelHak::where('idjabatan',$c->idJabatan)->first();
        session(['idkaryawan'=>$c->idKaryawan]);
        session(['nama'=>$c->namaKaryawan]);
        session(['jabatan'=>$c->idJabatan]);
        session(['h1'=>$d->admin]);
        session(['h2'=>$d->approver]);
        session(['h3'=>$d->pos]);
        session(['h4'=>$d->gudang]);

        session(['level'=>"Karyawan"]);
        \Alert::success('Login berhasil', 'Info')->autoClose(2000);
        return redirect('beranda');
    }

    public function logout(Request $request){
    	$request->session()->regenerate();
    	$request->session()->flush();
    	return redirect('loginvendor');
    }
}
