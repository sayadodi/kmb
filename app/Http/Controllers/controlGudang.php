<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\modelMasterVendor;
use App\Models\modelHistoriVendor;
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
            $status = $r->status;
            $password = acak(6);
            $alasan = $r->alasan;
            $nama = $r->namavendor;
            $email = $r->email;

            if($status == "Aktif"){
                $pesan = "Selamat vendor anda kami terima sebagai mitra dari KMBarang untuk melakukan keluar masuk barang pada UBJOM U9 Paiton Probolinggo, silahkan gunakan password ini untuk masuk pada aplikasi : ";
                
                Mail::send('email.terima', array('pesan' => $pesan,'password' => $password, 'alasan' => $alasan, 'nama'=> $nama, 'email'=> $email) , function($m) use($email){
                    $m->from(env('MAIL_USERNAME','coba6464.ku@gmail.com'),'UBJOM U9');
                    $m->to($email,'Verifikasi')->subject('Vendor anda telah kami terima');
                    
                });
                $simpan = modelMasterVendor::findOrFail($id);
                $simpan->status = "Aktif";
                $simpan->password = md5($password);
                $simpan->save();
            }else if($status == "Ditolak"){
                $pesan = "Nama Vendor </br> Akun anda telah kami terima, silahkan gunakan password ini untuk masuk pada aplikasi KMBarang : <b>Password</b>";
                
                Mail::send('email.terima', array('pesan' => $pesan, 'password' => $password, 'alasan' => $alasan, 'nama'=> $nama, 'email'=> $email) , function($m) use($email){
                    $m->from(env('MAIL_USERNAME','coba6464.ku@gmail.com'),'UBJOM U9');
                    $m->to($email,'Verifikasi')->subject('Vendor anda kami tolak');
                    
                });
            }else{

            }
            $histori = new modelHistoriVendor();
            $histori->kdvendor = $id;
            $histori->kdkaryawan = session('idkaryawan');
            $histori->tgltt = date("Y-m-d H:i:s");  
            $histori->alasan = $alasan;
            $histori->status = $status;
            $histori->save();
            
            return redirect('requestvendor');
        }catch (Exception $e){
            return response (['status' => false,'errors' => $e->getMessage()]);
        }
    }
}
