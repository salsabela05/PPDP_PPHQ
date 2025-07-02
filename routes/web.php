<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FormulirController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KetuaTPAController;
use App\Http\Controllers\SekretarisController;



Route::get('/', function () {
    return view('home');
});

Route::middleware("guest")->group(function () {
    Route::get('/login', [AuthController::class,"login"])->name("login");
    Route::get('/register', [AuthController::class,"register"]);
    Route::post("/register/submit", [AuthController::class,"register_submit"]);
    Route::post("/login/submit", [AuthController::class,"login_submit"]);
});

Route::middleware("auth")->group(function () {
    Route::get('/logout', [AuthController::class,"logout"]);
    Route::get('/app/dashboard', function () {
        return view('app/dashboard');
    })->name("home");

    Route::get('/app/formulir', [FormulirController::class,"formulir"]);
    Route::post('/app/formulir/submit', [FormulirController::class,"formulir_submit"]);

    Route::post('/formulir/upload-surat', [FormulirController::class, 'uploadSurat'])->name('formulir.uploadSurat');

    Route::get('/app/daftar-formulir', [\App\Http\Controllers\FormulirController::class, 'daftar_formulir']);

    Route::get('/admin/formulir', [FormulirController::class, 'daftar_formulir']);
    Route::get('/admin/formulir/verifikasi/{id}/{status}', [FormulirController::class, 'verifikasi'])->name('formulir.verifikasi');
    Route::post('/admin/formulir/tolak/{id}', [FormulirController::class, 'tolak']);

    Route::get('/app/pembayaran', [PembayaranController::class,"pembayaran"]);
    Route::post('/app/pembayaran/submit', [PembayaranController::class,"pembayaran_submit"]);
    
    Route::get('/app/manajemen-akun', [DashboardController::class,"manajemen_akun"]);
    Route::post('/app/manajemen-akun/reset', [DashboardController::class,"manajemen_akun_reset"]);

    Route::get('/app/daftar-pembayaran', [PembayaranController::class,"daftar_pembayaran"]);
    Route::post('/app/daftar-pembayaran/submit', [PembayaranController::class,"daftar_pembayaran_submit"]);
    Route::post('/app/daftar-pembayaran/konfirmasi/{id}', [PembayaranController::class,"daftar_pembayaran_konfirmasi"]);
    Route::post('/app/daftar-pembayaran/tolak/{id}', [PembayaranController::class,"daftar_pembayaran_tolak"]);
    
    Route::get('/ketua-tpa/santri-diterima', [KetuaTPAController::class, 'santriDiterima'])->name('ketua-tpa.santri-diterima');
    Route::post('/ketua-tpa/input-hasil/{id}', [KetuaTPAController::class, 'inputHasilSeleksi'])->name('ketua-tpa.input-hasil');

    Route::get('/sekretaris/kelas', [SekretarisController::class, 'daftarKelas'])->name('sekretaris.kelas');
    Route::get('/sekretaris/kelas/{jenjang}/cetak', [SekretarisController::class, 'cetakAbsensi'])->name('sekretaris.kelas.cetak');
    Route::get('/app/laporan/cetak/absensi/{kelas}', [SekretarisController::class, 'cetakAbsensi'])->name('laporan.cetak.absensi');


    Route::get('/app/laporan', [LaporanController::class,"laporan"]);
    Route::get('/app/laporan/cetak', [LaporanController::class,"cetak"]);

    Route::get('/app/laporan/export/pdf', [LaporanController::class, 'export_pdf']);

    
    Route::get('/app/laporan/pembayaran', [LaporanController::class,"laporan_pembayaran"]);
    Route::get('/app/laporan/cetak/pembayaran', [LaporanController::class,"cetak_pembayaran"]);

    Route::get('/app/laporan/pdf/pembayaran', [LaporanController::class, 'exportPDFPembayaran']);

    Route::get('/app/dashboard', [DashboardController::class, 'index']);
});


