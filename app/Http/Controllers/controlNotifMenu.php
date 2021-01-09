<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\modelMasterVendor;
use App\Models\modelPengiriman;
use App\Models\modelDetailBarangpo;
use App\Models\modelDetailTamu;
use App\Models\modelKendaraan;

class controlNotifMenu extends Controller
{
    public static function jmlvendor(){
        $vendor = modelMasterVendor::where('status','Meminta')->count();
    	return $vendor; 
    }

    public static function jmlkiriman(){
        $vendor = modelPengiriman::where('statuskiriman','Meminta Gudang')->count();
    	return $vendor; 
    }
}
