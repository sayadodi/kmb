<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\modelMasterVendor;
use App\Models\modelHistoriVendor;
use App\Models\modelPengiriman;
use App\Models\modelDetailBarangpo;
use App\Models\modelDetailTamu;
use App\Models\modelKendaraan;
use Mail;
use DB;

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
            $password = acak(4);
            $alasan = $r->alasan;
            $nama = $r->namavendor;
            $email = $r->email;

            if($status == "Aktif"){
                $pesan = "Selamat akun anda telah terdaftar di Aplikasi KMBarang PT PJB UBJOM PLTU Paiton, silahkan gunakan : ";
                
                Mail::send('email.terima', array('pesan' => $pesan,'password' => $password, 'alasan' => $alasan, 'nama'=> $nama, 'email'=> $email) , function($m) use($email){
                    $m->from(env('MAIL_USERNAME','coba6464.ku@gmail.com'),'PT PJB UBJOM PLTU Paiton');
                    $m->to($email,'Verifikasi')->subject('Vendor anda telah kami terima');
                    
                });
                $simpan = modelMasterVendor::findOrFail($id);
                $simpan->status = "Aktif";
                $simpan->password = md5($password);
                $simpan->save();
            }else if($status == "Ditolak"){
                $pesan = "Maaf vendor anda kami tolak di Aplikasi KMBarang PT PJB UBJOM PLTU Paiton, silahkan cek kembali data anda: ";
                
                Mail::send('email.terima', array('pesan' => $pesan, 'password' => $password, 'alasan' => $alasan, 'nama'=> $nama, 'email'=> $email) , function($m) use($email){
                    $m->from(env('MAIL_USERNAME','coba6464.ku@gmail.com'),'PT PJB UBJOM PLTU Paiton');
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
            $histori->keterangan = "Minta Vendor";
            $histori->save();
            
            return redirect('requestvendor');
        }catch (Exception $e){
            return response (['status' => false,'errors' => $e->getMessage()]);
        }
    }

    public function daftarkiriman(){
        $kiriman = DB::table('tbpengiriman as p')->join('tbvendor as v','p.kodevendor','=','v.kdvendor')->where('statuskiriman','Meminta Gudang')->get();
        return view('prosesterima.reqkiriman',compact('kiriman'));
    }

    public function detailkiriman($id){
        $kiriman = DB::table('tbpengiriman as p')->join('tbvendor as v','p.kodevendor','=','v.kdvendor')->where('p.kodekirim',$id)->get()->first();
        return view('prosesterima.detailreqkiriman',compact('kiriman','id'));
    }

    public function databarangpo($id){
        $data = modelDetailBarangpo::where('idkirim',$id)->get();
        return view('prosesterima.include.daftarbarangpo',compact('data','id'));
    }

    public function datapembawa($id){
        $data = modelDetailTamu::where('idtamu',$id)->where('jenis','Pengiriman')->get();
        return view('prosesterima.include.daftarpembawabarang',compact('data','id'));
    }

    public function datakendaraan($id){
        $data = modelKendaraan::where('idtamu',$id)->where('jenis','Pengiriman')->get();
        return view('prosesterima.include.daftarkendaraan',compact('data','id'));
    }
}
