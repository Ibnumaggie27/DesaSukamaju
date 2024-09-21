<?php

use App\Http\Controllers\LandingPage\APBDesaController;
use App\Http\Controllers\LandingPage\BeritaController;
use App\Http\Controllers\LandingPage\GaleriController;
use App\Http\Controllers\LandingPage\LembagaDesaController;
use App\Http\Controllers\LandingPage\BerandaController;
use App\Http\Controllers\LandingPage\PegawaiController;
use App\Http\Controllers\LandingPage\PengumumanController;
use App\Http\Controllers\LandingPage\StrukturDesaController;
use Illuminate\Support\Facades\Route;


Route::get('/', [BerandaController::class, 'index'])->name('beranda');


Route::prefix('pemerintah')->name('pemerintah.')->group(function () {
    Route::controller(StrukturDesaController::class)->prefix('organisasi')->name('organisasi.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('{jabatan}', 'show')->name('detail');
    });
    Route::controller(PegawaiController::class)->prefix('perangkat')->name('perangkat.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('{pegawai}', 'show')->name('detail');
    });
    Route::controller(LembagaDesaController::class)->prefix('lembaga')->name('lembaga.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('{lembaga}', 'show')->name('detail');
    });
});

Route::prefix('informasi')->name('informasi.')->group(function () {
    Route::controller(BeritaController::class)->prefix('berita')->name('berita.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('{slug}', 'show')->name('detail');
    });


    Route::controller(PengumumanController::class)->prefix('pengumuman')->name('pengumuman.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('{slug}', 'show')->name('detail');
    });

    Route::get('galeri', [GaleriController::class, 'index'])->name('galeri.index');

    Route::prefix('apb')->name('apb.')->group(function () {
        Route::get('/', [APBDesaController::class, 'index'])->name('index');
        Route::get('/{apb}', [APBDesaController::class, 'show'])->name('detail');
        Route::get('/getuser', [APBDesaController::class, 'getUser'])->name('getuser');
    });
});
