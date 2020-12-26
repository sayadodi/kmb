<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\modelMasterVendor;
use Mail;

class controlGudang extends Controller
{
    public function daftarvendor(){
        $vendor = modelMasterVendor::where('status','Meminta')->get();
    	return view('prosesterima.reqvendor',compact('vendor'));
    }

    public function detailvendor($id){
        $vendor = modelMasterVendor::findOrFail($id);
    	return view('prosesterima.detailreqvendor',compact('vendor'));
    }
    
    public function terimavendor(Request $r, $id){
        try{
            $email = $r->email;
            $status = $r->status;
            $alasan = $r->alasan;
            if($status == "Terima"){
                $pesan = "Nama Vendor </br> Akun anda telah kami terima, silahkan gunakan password ini untuk masuk pada aplikasi KMBarang : <b>Password</b>";
                
                Mail::send('email.terima', array('pesan' => $pesan) , function($pesan){
                    $pesan->to('gatotkoco419@gmail.com','Verifikasi')->subject('Vendor anda telah kami terima');
                    $pesan->from(env('MAIL_USERNAME','coba6464.ku@gmail.com'),'UBJOM U9');
                });
            }else{

            }
            
        }catch (Exception $e){
            return response (['status' => false,'errors' => $e->getMessage()]);
        }
    }
}
