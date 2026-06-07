<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Barang;
use App\Models\Penjualan;
use App\Models\PenjualanDetail;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Auth\OtpController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\WilayahController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\BarcodeReaderController;
use App\Http\Controllers\KunjunganTokoController;

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::get('/auth/google', [GoogleController::class, 'redirect']);
Route::get('/auth/google/callback', [GoogleController::class, 'callback']);

Route::get('/otp', [OtpController::class, 'showForm'])->name('otp.form');
Route::post('/otp', [OtpController::class, 'verify'])->name('otp.verify');


Route::middleware(['auth'])->group(function () {
    Route::get('/home', function () {
        return view('home');
    })->name('home');
    
    Route::resource('kategori', KategoriController::class);
    Route::resource('buku', BukuController::class);
    
    Route::resource('barang', BarangController::class);
    Route::post('/barang/print', [BarangController::class, 'printLabel'])
    ->name('barang.print');

    Route::get('/pdf/sertifikat', [PdfController::class, 'sertifikat']);
    Route::get('/pdf/pengumuman', [PdfController::class, 'pengumuman']);

    Route::get('/wilayah', [WilayahController::class, 'index']);
    Route::get('/get-provinsi', [WilayahController::class, 'getProvinsi']);
    Route::get('/wilayah-axios', [WilayahController::class, 'axios']);

    Route::get('/penjualan', [PenjualanController::class, 'index']);
    Route::get('/penjualan-axios', [PenjualanController::class, 'axios']);
    Route::post('/penjualan/store', [PenjualanController::class, 'store']);
    Route::get('/get-barang/{kode}', function($kode) {
    $barang = Barang::where('id_barang', $kode)->first();

    if (!$barang) {
        return response()->json(null, 404);
    }

    return response()->json($barang);
    });

    Route::view('/modul4/barang-table', 'modul4.barang_table');
    Route::view('/modul4/barang-datatable', 'modul4.barang_datatable');
    Route::get('/modul4/kota', function () {
    return view('modul4.kota');
});

Route::get('/barcode-reader', [BarcodeReaderController::class, 'index']);
});

Route::get('/kunjungan-toko', [KunjunganTokoController::class, 'index']);
Route::post('/kunjungan-toko/store', [KunjunganTokoController::class, 'storeToko']);
Route::get('/get-toko/{barcode}', [KunjunganTokoController::class, 'getToko']);
Route::get('/kunjungan-toko/barcode/{barcode}', [KunjunganTokoController::class, 'cetakBarcode']);