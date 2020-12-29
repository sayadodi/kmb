<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});
Route::get('/login','controlKaryawan@login');
Route::post('/login','controlKaryawan@postLogin');
Route::get('/logout','controlKaryawan@logout');

Route::get('/beranda','controlData@beranda');
Route::get('/daftarvendor','controlMaster@vendor');
Route::get('/daftarvendor/{id}/edit','controlMaster@lihatVendor');
Route::put('/daftarvendor/{id}/edit','controlMaster@ubahVendor');

Route::get('/daftarjabatan','controlMaster@jabatan');
Route::post('/daftarjabatan/simpan','controlMaster@simpanJabatan');
Route::get('/daftarjabatan/hapus/{id}','controlMaster@hapusJabatan');

Route::get('/daftarkaryawan','controlMaster@karyawan');
Route::get('/daftarkaryawan/hapus/{id}','controlMaster@hapusKaryawan');
Route::get('/daftarkaryawan/{id}/edit','controlMaster@lihatKaryawan');
Route::put('/daftarkaryawan/{id}/edit','controlMaster@ubahKaryawan');

Route::get('/daftarpengaturanapprover','controlPengaturan@pengaturanapprover');
Route::get('/daftarpengaturanapprover/tambah','controlPengaturan@tambahPengaturanapprover')->name('tambahapprover');
Route::post('/daftarpengaturanapprover/tambah','controlPengaturan@simpanPengaturanApprover');

Route::get('/aturhak','controlPengaturan@pengaturanhak');
Route::get('/aturhak/{id}','controlPengaturan@settingHak')->name('sethak');

// Penerimaan vendor
Route::get('/requestvendor','controlGudang@daftarvendor');
Route::get('/requestvendor/{id}','controlGudang@detailvendor');
Route::post('/requestvendor/{id}','controlGudang@terimavendor');


// Vendor daftar
// Vendor proses
Route::group(['middleware' => ['cekbrowser']],function(){
    Route::get('/loginvendor','controlVendor@login');
    Route::post('/loginvendor','controlVendor@posLogin');
    Route::get('/daftar','controlDaftar@index');
    Route::post('/daftar','controlDaftar@postDaftar');
    Route::get('/daftarsukses','controlDaftar@sukses');
    Route::get('/lupapassword','controlDaftar@lupapassword');
    Route::post('/lupapassword','controlDaftar@kirimemaillupa');
    Route::get('/infolupaspassword','controlDaftar@infolupapassword');
});

// Akses rute vendor
Route::group(['middleware' => ['cekbrowser','cekloginvendor']],function(){
    Route::get('/berandavendor','controlVendor@berandavendor');
    Route::get('/keluarvendor','controlVendor@logout');
    Route::get('/ubahpassv','controlVendor@ubahpass');
    Route::post('/ubahpassv','controlVendor@storepass');
    Route::get('/kirimpo','controlVendor@daftarkiriman');
    Route::post('/kirimpo/tambah','controlVendor@tambahpo');


    // Include Ajax
    Route::get('/datadaftarkiriman','controlVendor@datadaftarkiriman');

    Route::get('/kirimbarang','controlVendor@kirimbarang');
});



