<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\modelMasterVendor;
use App\Models\modelJabatan;
use App\Models\modelKaryawan;
use Session;
use Validator;

class controlMaster extends Controller
{
    public function vendor(){
        $vendor = modelMasterVendor::all();
        return view('master.vvendor', compact('vendor'));
    }

    public function lihatVendor($id){
        $vendor = modelMasterVendor::findOrFail($id);
    	return view('form.evendor',compact('vendor'));
    }

    public function ubahVendor(Request $request, $id){
        $input = $request->all();
        $validator = Validator::make($input,[
                'namavendor' => 'required|string|min:3|max:50',
                'telepon' => 'required|string|min:7|max:14',
                'email' => 'required|email',
                'status' => 'required|in:0,1',
                'alamat' => 'required|string|min:5',
        ]);

        if ($validator->fails()) {
            return redirect('daftarvendor/'.$id.'/edit')->withInput()->withErrors($validator);
        }
    	$simpan = modelMasterVendor::findOrfail($id);
        $simpan->namavendor = $request->namavendor;
        $simpan->telepon = $request->telepon;
        $simpan->email = $request->email;
        $simpan->status = $request->status;
        $simpan->alamat = $request->alamat;
        $simpan->save();
        Session::flash('flash_message','Data berhasil disimpan.');
        return redirect('daftarvendor');
    }

    public function jabatan(){
        $data = modelJabatan::all();
        return view('master.jabatan', compact('data'));
    }

    public function hapusJabatan($id){
        $hapus = modelJabatan::findOrfail($id);
    	$hapus->delete();
    	Session::flash('flash_message','Data berhasil dihapus.');
    	Session::flash('penting');
    	return redirect('daftarjabatan');
    }

    public function simpanJabatan(Request $r){
        $input = $r->all();
    	$validator = Validator::make($input,[
    		'jabatan' => 'required|string|min:5|max:50',
    	]);
    	if ($validator->fails()) {
    		return redirect('daftarjabatan')->withInput()->withErrors($validator);
    	}
    	if ($r->simpanjabatan == "Submit") {
    		$simpan = new modelJabatan();
	    	$simpan->jabatan = $r->jabatan;
	    	$simpan->save();
	    	Session::flash('flash_message','Data berhasil disimpan.');
    	}elseif ($r->simpanjabatan == "Edit") {
    		$id = $r->idJab;
    		$simpan = modelJabatan::findOrfail($id);
	    	$simpan->jabatan = $r->jabatan;
	    	$simpan->save();
	    	Session::flash('flash_message','Data berhasil diubah.');
    	}
    	return redirect('daftarjabatan');
    }

    public function karyawan(){
        $data = modelKaryawan::all();
        return view('master.vkaryawan', compact('data'));
    }

    public function lihatKaryawan($id){
        $jabatan = modelJabatan::all();
        $karyawan = modelKaryawan::findOrfail($id);
        return view('form.ekaryawan',compact('karyawan','jabatan'));
    }

    public function ubahKaryawan(Request $request, $id){
        $input = $request->all();
        $validator = Validator::make($input,[
                'namaKaryawan' => 'required|string|min:3|max:50',
                'tlpKaryawan' => 'required|string|min:7|max:14',
                'email' => 'required',
                'status' => 'required|in:Y,N',
                'alamatKaryawan' => 'required|string|min:5',
        ]);

        if ($validator->fails()) {
            return redirect('daftarkaryawan/'.$id.'/edit')->withInput()->withErrors($validator);
        }

        $gambar = $request->file('ttd');
        if (!empty($gambar)) {
            $extg = $gambar->getClientOriginalExtension();
            if ($request->file('ttd')->isValid()) {
                $nama_gambar = "TTD".date("YmdHis").".$extg";
                $tempat_gambar = "gambar";
                $request->file('ttd')->move($tempat_gambar, $nama_gambar);
            }
        }

        $simpan = modelKaryawan::findOrfail($id);
        $simpan->namaKaryawan = $request->namaKaryawan;
        $simpan->tlpKaryawan = $request->tlpKaryawan;
        $simpan->email = $request->email;
        $simpan->status = $request->status;
        $simpan->alamatKaryawan = $request->alamatKaryawan;
        $simpan->idJabatan = $request->idJabatan;
        $simpan->android = $request->android;
        $simpan->web = $request->web;
        if (!empty($request->password)) {
            $simpan->password = md5($request->password);
        }
        if (!empty($gambar)) {
            $simpan->ttd = $nama_gambar;
        }
        $simpan->save();
        Session::flash('flash_message','Data berhasil disimpan.');
        return redirect('daftarkaryawan');
    }

    public function hapusKaryawan($id){
        $hapus = modelKaryawan::findOrfail($id);
    	$hapus->delete();
    	Session::flash('flash_message','Data telah terhapus!');
    	Session::flash('penting');
    	return redirect('daftarkaryawan');
    }
}
