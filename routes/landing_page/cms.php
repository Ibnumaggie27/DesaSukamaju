<?php

use App\Http\Controllers\LandingPage\CMS\APBDesaController;
use App\Http\Controllers\LandingPage\CMS\BeritaController;
use App\Http\Controllers\LandingPage\CMS\GaleriController;
use App\Http\Controllers\LandingPage\CMS\JabatanPegawaiController;
use App\Http\Controllers\LandingPage\CMS\LembagaDesaController;
use App\Http\Controllers\LandingPage\CMS\PegawaiController;
use App\Http\Controllers\LandingPage\CMS\PengumumanController;
use App\Http\Controllers\landingPage\CMS\StrukturDesaController;
use Illuminate\Support\Facades\Route;

Route::prefix('LandingPage')->middleware(['auth', 'petugasAdmin'])->name('cms.')->group(function () {
    Route::get('/', function () {
        return view('landing_page.cms.index', [
            'title'           => 'Dashboard'
        ]);
    })->name('index');

    Route::post('berita/img/upload', [BeritaController::class, 'CKEditorUpload'])->name('ckeditor.upload');

    Route::post('struktur-desa/upload', [StrukturDesaController::class, 'upload_structure'])->name('struktur-desa.upload');
    Route::resource('struktur-desa', StrukturDesaController::class);
    Route::resource('struktur-desa', StrukturDesaController::class);
    Route::resource('lembaga-desa', LembagaDesaController::class);

    Route::resource('berita', BeritaController::class, ['parameters' => ['berita' => 'berita']]);
    Route::resource('pengumuman', PengumumanController::class);
    Route::resource('galeri', GaleriController::class);
    Route::resource('apb', APBDesaController::class);
    Route::get('apb/{apb}/editPengeluaran', [APBDesaController::class, 'editPengeluaran'])->name('apb.editPengeluaran');
    Route::put('apb/{apb}/updatePengeluaran', [APBDesaController::class, 'updatePengeluaran'])->name('apb.updatePengeluaran');

    Route::resource('pegawai', PegawaiController::class);
    Route::resource('jabatan', JabatanPegawaiController::class);
});
