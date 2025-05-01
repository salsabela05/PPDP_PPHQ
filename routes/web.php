<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FormulirController;
use App\Http\Controllers\PembayaranController;
use Illuminate\Support\Facades\Route;

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

    Route::get('/app/pembayaran', [PembayaranController::class,"pembayaran"]);
    Route::post('/app/pembayaran/submit', [PembayaranController::class,"pembayaran_submit"]);

    Route::get('/app/laporan', function () {
        return view('app/laporan');
    });
});


