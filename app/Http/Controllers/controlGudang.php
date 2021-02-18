<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\modelMasterVendor;
use App\Models\modelHistoriVendor;
use App\Models\modelPengiriman;
use App\Models\modelDetailBarangpo;
use App\Models\modelDetailTamu;
use App\Models\modelKendaraan;
use App\Models\modelAprrove;
use App\Models\modelPengaturan;
use App\Models\modelHistoriTamu;
use App\Models\modelBlokir;
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
        $kiriman = DB::table('tbpengiriman as p')->join('tbvendor as v','p.kodevendor','=','v.kdvendor')->select('p.*','namavendor')->where('statuskiriman','Meminta Gudang')->get();
        return view('prosesterima.reqkiriman',compact('kiriman'));
    }

    public function detailkiriman($id){
        $kiriman = DB::table('tbpengiriman as p')->join('tbvendor as v','p.kodevendor','=','v.kdvendor')->where('p.kodekirim',$id)->get()->first();
        $status = modelHistoriVendor::where('idkirim',$id)->orderBy('idhistoriv','desc')->first();
        $jmlbarang = modelDetailBarangpo::where('idkirim',$id)->where('jenisbarang','PO')->count();
        $jmlbawa = modelHistoriTamu::where('idtamu',$id)->where('jenis','Pengiriman')->count();
        $jmltools = modelDetailBarangpo::where('idkirim',$id)->where('jenisbarang','NonPO')->count();

        return view('prosesterima.detailreqkiriman',compact('kiriman','id','status','jmlbarang','jmlbawa','jmltools'));
    }

    public function databarangpo($id){
        $data = modelDetailBarangpo::where('idkirim',$id)->get();
        return view('prosesterima.include.daftarbarangpo',compact('data','id'));
    }

    public function datapembawa($id){
        $data = DB::table('tbhistoritamu as h')->join('tbdetailtamu as d','h.iddetailtamu','=','d.iddetailtamu')->select('d.*','h.idhistori')->where('h.idtamu',$id)->where('h.jenis','Pengiriman')->get();
        return view('prosesterima.include.daftarpembawabarang',compact('data','id'));
    }

    public function datakendaraan($id){
        $data = DB::table('tbhistorikendaraan as h')->join('tbkendaraan as k','h.idkendaraan','=','k.idkendaraan')->select('k.*','h.idhistorikend')->where('h.idtamu',$id)->where('h.jenis','Pengiriman')->get();
        return view('prosesterima.include.daftarkendaraan',compact('data','id'));
    }

    public function terimakiriman(Request $r){
        $kode = $r->idkirim;
        $status = $r->status;
        $cariset = modelPengaturan::where('jenis','Masuk')->get()->first();
        $kodeset = $cariset->kodeatur;
        $s = modelPengiriman::findOrFail($kode);
        $histori = new modelHistoriVendor();
        $histori->kdvendor = $s->kodevendor;
        $histori->kdkaryawan = session('idkaryawan');
        $histori->tgltt = date("Y-m-d H:i:s");  
        $histori->alasan = $r->keterangan;
        $histori->keterangan = "Minta Kirim";
        $histori->idkirim = $kode;

        if($status == "Terima"){
            $s->statuskiriman = "Diterima Gudang";
            $s->idpengaturan = $kodeset;
            $histori->status = "Terima";
            $a = new modelAprrove();
            $a->tglapprove = date("Y-m-d H:i:s");
            $a->jenisapprove = "Barang";
            $a->idpengiriman = $kode;
            $a->save();
        }else if($status == "Tolak"){
            $s->statuskiriman = "Ditolak Gudang";
            $histori->status = "Tolak";
        }else{

        }
        $histori->save();
        $s->save();

        

        return \Response::json($s);
        
    }

    public function blokir(){
        $data = modelBlokir::all();
        return view('prosesterima.blokiremail',compact('data'));
    }

    public function tambahblokir(Request $r){
        $mail = $r->email;
        $s =new modelBlokir();
        $s->email = $mail;
        $s->tglblok = date("Y-m-d H:i:s");
        $s->save();
        return redirect('blokiremail');
    }

    public function hapusblokir($id){
        $s = modelBlokir::where('idblokir',$id)->get()->first();
        $s->delete();
        return redirect('blokiremail');
    }
}
