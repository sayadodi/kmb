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

Route::get('/coba/{ida}/{idp}','controlNotifMenu@coba');

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
// Penerimaan dan tolak kiriman
Route::get('/requestkiriman','controlGudang@daftarkiriman');
Route::get('/requestkiriman/{id}','controlGudang@detailkiriman')->name('detailreqkiriman');
Route::post('/requestkiriman','controlGudang@terimakiriman');
// Include Ajax kiriman
Route::get('/databarangpor/{id}','controlGudang@databarangpo');
Route::get('/datapembawar/{id}','controlGudang@datapembawa');
Route::get('/datakendaraanr/{id}','controlGudang@datakendaraan');
// Rute POS
Route::get('/barangmasuk','controlPos@barangmasuk');
Route::post('/barangmasukterima','controlPos@terimabarang');
Route::get('/tamu','controlPos@tamu');
Route::get('/simip','controlPos@simip');
Route::get('/barangmasuk/{id}','controlPos@detailbarangmasuk')->name('kirimanbarang');
Route::post('/ubahnopass','controlPos@ubahnopass');
Route::post('/foto','controlPos@simpanfoto');
// Include Ajax Pos
Route::get('/databarangpopos/{id}','controlPos@databarangpo');
Route::get('/datapembawapos/{id}','controlPos@datapembawa');
Route::get('/datakendaraanpos/{id}','controlPos@datakendaraan');
Route::get('/historiapprove/{id}','controlPos@historiapprove');
Route::get('/tombol/{id}','controlPos@tombol');
// Rute Lobby
Route::get('/scan','controlLobby@scan');
Route::get('/scan/{id}','controlLobby@cariscan');
Route::post('/ubahnopassa','controlLobby@ubahnopassa');
Route::post('/ubahgatepass','controlLobby@ubahgatepass');

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
    Route::get('/kirimnonpo','controlVendor@kirimnonpo');
    Route::post('/kirimnonpo/tambah','controlVendor@tambahnonpo');
    Route::get('/kirimbarang/{jenis}/{id}','controlVendor@kirimbarang')->name("kirimbarang");

    // Include Ajax
    Route::get('/kirimanberanda','controlVendor@kirimanberanda');
    Route::get('/datadaftarkiriman','controlVendor@datadaftarkiriman');
    Route::get('/datadaftarkirimannonpo','controlVendor@datadaftarkirimannonpo');
    Route::get('/databarangpo/{jenis}/{id}','controlVendor@databarangpo');
    Route::get('/datapembawa/{jenis}/{id}','controlVendor@datapembawa');
    Route::get('/datatujuan/{jenis}/{id}','controlVendor@datatujuan');
    Route::get('/datakendaraan/{jenis}/{id}','controlVendor@datakendaraan');
    Route::get('/ketsamping/{id}','controlVendor@ketsamping');

    // Manipulasi pengiriman
    Route::post('/simpanbarangpo','controlVendor@simpanbarangpo');
    Route::post('/simpanpembawa','controlVendor@simpanpembawa');
    Route::post('/simpantujuan','controlVendor@simpantujuan');
    Route::post('/simpankendaraan','controlVendor@simpankendaraan');
    Route::post('/kirimpengiriman','controlVendor@kirimpengiriman');

    // Hapus dan ubah
    Route::put('/ubahbarang/{id}','controlVendor@ubahbarang');
    Route::put('/ubahpembawa/{id}','controlVendor@ubahpembawa');
    Route::put('/ubahkendaraan/{id}','controlVendor@ubahkendaraan');
    Route::get('/hapuskirimanpo/{id}','controlVendor@hapuskirimanpo');
    Route::get('/hapuskirimannonpo/{id}','controlVendor@hapuskirimannonpo');
    Route::get('/hapusbarang/{id}','controlVendor@hapusbarang');
    Route::get('/hapuspembawa/{id}','controlVendor@hapuspembawa');
    Route::get('/hapuskendaraan/{id}','controlVendor@hapuskendaraan');
});



