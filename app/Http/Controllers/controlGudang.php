<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\modelMasterVendor;

class controlGudang extends Controller
{
    public function daftarvendor(){
        $vendor = modelMasterVendor::where('status','Meminta')->get();
    	return view('proses.reqvendor',compact('vendor'));
    }

    public function detailvendor($id){
        $vendor = modelMasterVendor::findOrFail($id);
    	return view('proses.detailreqvendor',compact('vendor'));
    }
    
    public function terimavendor($id){

    }
}
