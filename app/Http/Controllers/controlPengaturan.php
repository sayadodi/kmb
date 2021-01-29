<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\modelPengaturan;
use App\Models\modelDetailPengaturan;
use App\Models\modelJabatan;
use App\Models\modelHak;

class controlPengaturan extends Controller
{
    public function pengaturanapprover(){
        $data = modelPengaturan::all();
        return view('master.pengaturan',compact('data'));
    }

    public function tambahPengaturanapprover(){
        $jabatan = modelJabatan::all();
        return view('master.settingApprove',compact('jabatan'));
    }

    public function simpanPengaturanApprover(Request $r){
        $jenis = $r->xjenis;
        $u = 1;
        $a = new modelPengaturan();
        $a->tglbuat = date("Y-m-d H:i:s");
        $a->jenis = $jenis;
        $a->save();
        $idatur = $a->kodeatur;
        foreach($r->baru as $b){
            $s = new modelDetailPengaturan();
            $s->idatur = $idatur;
            $s->urutan = $u;
            $s->kodejabatan = $b;
            $s->save();
            $u++;
        }
        return \Response::json($s);
    }

    public function pengaturanhak(){
        $data = modelJabatan::all();
        return view('master.hak',compact('data'));
    }

    public function settingHak($id){
    	$jabatan = modelJabatan::findOrfail($id);
        $hak = modelHak::where('idJabatan',$id)->first();
    	return view('master.settingHak',compact('jabatan','hak'));
    }
}
