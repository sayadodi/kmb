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

    public function kirimemaillupa(){
        
    }

    public function infolupapassword(){
        return view('vendor.infolupa');
    }

    
}
