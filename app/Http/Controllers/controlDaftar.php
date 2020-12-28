<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\modelMasterVendor;

class controlDaftar extends Controller
{
    public function index(){
        return view('vendor.daftar');
    }

    public function postDaftar(Request $r){
        $email = $r->email;
        $vendor = $r->vendor;
        $tlp = $r->tlp;
        $alamat = $r->alamat;

        $s = new modelMAsterVendor();
        $s->namavendor = $vendor;
        $s->email = $email;
        $s->telepon = $tlp;
        $s->alamat = $alamat;
        $s->save();

        \Alert::success('Berhasil', 'Info')->autoClose(2000);
        return redirect('daftarsukses');
    }

    public function sukses(){
        return view('vendor.berhasil');
    }

    public function lupapassword(){
        return view('vendor.lupapassword');
    }

    public function kirimemaillupa(Request $r){
        $email = $r->email;
        $password = "1234";
        Mail::send('email.lupapassword', array('password' => $password) , function($m) use($email){
            $m->from(env('MAIL_USERNAME','coba6464.ku@gmail.com'),'UBJOM U9');
            $m->to($email,'Verifikasi')->subject('Reset Password KMBarang');
            
        });
        $simpan = modelMasterVendor::findOrFail($id);
        $simpan->password = md5($password);
        $simpan->save();
        return redirect('infolupaspassword');
    }

    public function infolupapassword(){
        return view('vendor.infolupa');
    }

    
}
