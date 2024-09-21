<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\PengajuanSuratController;
use App\Http\Controllers\TanggapanController;
use App\Http\Controllers\KependudukanController;
use App\Http\Controllers\KematianController;
use App\Http\Controllers\KelahiranController;
use App\Http\Controllers\MiskinController;
use App\Http\Controllers\ibuhamilController;
use App\Http\Controllers\anakyatimController;
use App\Http\Controllers\pkhController;
use App\Http\Controllers\bansosController;
use App\Http\Controllers\bpnController;
use App\Http\Controllers\bpsController;
use App\Http\Controllers\bbpController;
use App\Http\Controllers\bayi1sampai5tahunController;
use App\Models\Pengaduan;
use App\Models\Tanggapan;

Route::get('/linkstorage', function () {
    $targetFolder = base_path().'/storage/app/public';
    $linkFolder = $_SERVER['DOCUMENT_ROOT'].'/storage';

    // Cek apakah tautan simbolis sudah ada
    if (!file_exists($linkFolder)) {
        // Buat tautan simbolis jika belum ada
        symlink($targetFolder, $linkFolder);
        return "Link storage berhasil dibuat.";
    } else {
        return "Link storage sudah ada.";
    }
});

Route::get('/cachestorage', function () {
    $targetFolder = base_path().'/storage/app//framework/cache/laravel-excel';
    $linkFolder = $_SERVER['DOCUMENT_ROOT'].'/storage';

    // Cek apakah tautan simbolis sudah ada
    if (!file_exists($linkFolder)) {
        // Buat tautan simbolis jika belum ada
        symlink($targetFolder, $linkFolder);
        return "cache storage berhasil dibuat.";
    } else {
        return "cachek storage sudah ada.";
    }
});


Route::get('/masuk', [AuthController::class, 'masuk'])->name('login')->middleware('guest');
Route::post('/masuk', [AuthController::class, 'login'])->middleware('guest');
Route::get('/daftar', [AuthController::class, 'daftar'])->middleware('guest');
Route::post('/daftar', [AuthController::class, 'register'])->middleware('guest');
Route::get('/forgot_password', [AuthController::class, 'forgot_password'])->name('forgot-password')->middleware('guest');
Route::get('/validasi-forgot-password/{token}', [AuthController::class, 'validasi_forgot_password'])->name('validasi-forgot-password')->middleware('guest');
Route::post('/validasi-forgot-password-act', [AuthController::class, 'validasi_forgot_password_act'])->name('validasi-forgot-password-act')->middleware('guest');
Route::post('/forgot_password-act', [AuthController::class, 'forgot_password_act'])->name('forgot-password-act')->middleware('guest');
Route::post('/keluar', [AuthController::class, 'keluar'])->name('logout');

require __DIR__ . '/landing_page/landing_page.php';


Route::get('/dashboard', function () {
    return view('index', [
        'title'           => 'Dashboard',
        'total_laporan'   => Pengaduan::all()->count(),
        'laporan_selesai' => Pengaduan::where('status', 'selesai')->count(),
        'total_tanggapan' => Tanggapan::all()->count(),
    ]);
})->middleware('auth');

// Route::get('/', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/data/Pengaduan/Search', [PengaduanController::class, 'search']);
Route::put('/pengaduan/respon/{pengaduan}', [PengaduanController::class, 'response'])->middleware('auth');
Route::get('/pengaduan/belum', [PengaduanController::class, 'belum'])->middleware('auth');
Route::get('/pengaduan/proses', [PengaduanController::class, 'proses'])->middleware('auth');
Route::get('/pengaduan/selesai', [PengaduanController::class, 'selesai'])->middleware('auth');
Route::resource('/pengaduan', PengaduanController::class)->middleware('auth');
Route::resource('/tanggapan', TanggapanController::class)->middleware('auth');

Route::get('/pengajuan-surat/surat', function () {
    return view('pengajuan_surat.surat', [
        'title'           => 'Pilih-Surat',
    ]);
})->name('surat');

Route::get('/data/Pengajuan-Surat/Search', [PengajuanSuratController::class, 'search']);
Route::put('/pengajuan-surat/{pengajuan_surat}/approve', [PengajuanSuratController::class, 'approve'])->middleware('auth')->name('pengajuan_surat.approve');
Route::put('/pengajuan-surat/{pengajuan_surat}/verifikasi', [PengajuanSuratController::class, 'verifikasi'])->middleware('auth')->name('pengajuan_surat.verifikasi');
Route::put('/pengajuan-surat/{pengajuan_surat}/reject', [PengajuanSuratController::class, 'reject'])->middleware('auth')->name('pengajuan_surat.reject');
Route::get('/pengajuan-surat/{pengajuan_surat}/preview', [PengajuanSuratController::class, 'preview'])->middleware('auth')->name('pengajuan_surat.preview.surat');
Route::get('/pengajuan-surat/{pengajuan_surat}/previewew', [PengajuanSuratController::class, 'previewew'])->middleware('auth')->name('pengajuan_surat.previewew.surat');
Route::get('/pengajuan-surat/{pengajuan_surat}/download', [PengajuanSuratController::class, 'download'])->middleware('auth')->name('pengajuan_surat.download.surat');
Route::get('/pengajuan-surat/{pengajuan_surat}/downloaded', [PengajuanSuratController::class, 'downloaded'])->middleware('auth')->name('pengajuan_surat.downloaded.surat');
Route::get('/pengajuan-surat/{pengajuan_surat}/basah', [PengajuanSuratController::class, 'basah'])->middleware('auth')->name('pengajuan_surat.basah');
Route::put('/pengajuan-surat/{pengajuan_surat}/updatebasah', [PengajuanSuratController::class, 'updatebasah'])->middleware('auth')->name('pengajuan_surat.updatebasah');
Route::resource('/pengajuan-surat', PengajuanSuratController::class)->middleware('auth');

Route::group(['middleware' => ['auth', 'hanyaAdmin']], function () {
    Route::get('/pengguna/petugas', [UserController::class, 'petugas']);
    Route::resource('/pengguna', UserController::class);
});

Route::get('/pengelolaan-data/masyarakat', [UserController::class, 'masyarakat']);

//untuk Bantuan Beras Pemerintah
Route::get('/data/bbp', [bbpController::class, 'bbp']);
Route::get('/data/input-bbp', [bbpController::class, 'bbpInput']);
Route::get('/data/bbp/search', [bbpController::class, 'search']);
Route::post('/data/bbp/delete/{id}', [bbpController::class, 'destroy']);
Route::get('/data/bbp/detail/{id}', [bbpController::class, 'detail']);
Route::post('/data/bbp/update/{id}', [bbpController::class, 'update']);
Route::get('/get-data-by-nik/{NIK_CARI}', [bbpController::class, 'getDataByNIK']);
Route::post('/data/importbbp', [bbpController::class, 'importbbp'])->name('importbbp');
Route::post('/data/kirimbbp', [bbpController::class, 'kirimbbp'])->name('data.kirimbbp');

//untuk Bantuan PAngan Non Tunai
Route::get('/data/bpn', [bpnController::class, 'bpn']);
Route::get('/data/input-bpn', [bpnController::class, 'bpnInput']);
Route::get('/data/bpn/search', [bpnController::class, 'search']);
Route::post('/data/bpn/delete/{id}', [bpnController::class, 'destroy']);
Route::get('/data/bpn/detail/{id}', [bpnController::class, 'detail']);
Route::post('/data/bpn/update/{id}', [bpnController::class, 'update']);
Route::get('/get-data-by-nik/{NIK_CARI}', [bpnController::class, 'getDataByNIK']);
Route::post('/data/importbpn', [bpnController::class, 'importbpn'])->name('importbpn');
Route::post('/data/kirimbpn', [bpnController::class, 'kirimbpn'])->name('data.kirimbpn');

//untuk Bantuan Pangan Stunting
Route::get('/data/bps', [bpsController::class, 'bps']);
Route::get('/data/input-bps', [bpsController::class, 'bpsInput']);
Route::get('/data/bps/search', [bpsController::class, 'search']);
Route::post('/data/bps/delete/{id}', [bpsController::class, 'destroy']);
Route::get('/data/bps/detail/{id}', [bpsController::class, 'detail']);
Route::post('/data/bps/update/{id}', [bpsController::class, 'update']);
Route::get('/get-data-by-nik/{NIK_CARI}', [bpsController::class, 'getDataByNIK']);
Route::post('/data/importbps', [bpsController::class, 'importbps'])->name('importbps');
Route::post('/data/kirimbps', [bpsController::class, 'kirimbps'])->name('data.kirimbps');

//untuk Program Keluarga Harapan
Route::get('/data/pkh', [pkhController::class, 'pkh']);
Route::get('/data/input-pkh', [pkhController::class, 'pkhInput']);
Route::get('/data/pkh/search', [pkhController::class, 'search']);
Route::post('/data/pkh/delete/{id}', [pkhController::class, 'destroy']);
Route::get('/data/pkh/detail/{id}', [pkhController::class, 'detail']);
Route::post('/data/pkh/update/{id}', [pkhController::class, 'update']);
Route::get('/get-data-by-nik/{NIK_CARI}', [pkhController::class, 'getDataByNIK']);
Route::post('/data/importpkh', [pkhController::class, 'importpkh'])->name('importpkh');
Route::post('/data/kirimpkh', [pkhController::class, 'kirimpkh'])->name('data.kirimpkh');

//untuk Bantuan Sosial
Route::get('/data/bansos', [bansosController::class, 'bansos']);
Route::get('/data/input-bansos', [bansosController::class, 'bansosInput']);
Route::get('/get-data-by-nik/{NIK_CARI}', [bansosController::class, 'getDataByNIK']);
Route::post('/data/importbansos', [bansosController::class, 'importbansos'])->name('importbansos');
Route::post('/data/kirimbansos', [bansosController::class, 'kirimbansos'])->name('data.kirimabansos');

//untuk Anak Yatim
Route::get('/data/anakyatim', [anakyatimController::class, 'anakyatim']);
Route::get('/data/input-anakyatim', [anakyatimController::class, 'anakyatimInput']);
Route::get('/data/anakyatim/search', [anakyatimController::class, 'search']);
Route::post('/data/anakyatim/delete/{id}', [anakyatimController::class, 'destroy']);
Route::get('/data/anakyatim/detail/{id}', [anakyatimController::class, 'detail']);
Route::post('/data/anakyatim/update/{id}', [anakyatimController::class, 'update']);
Route::get('/get-data-by-nik/{NIK_CARI}', [anakyatimController::class, 'getDataByNIK']);
Route::post('/data/importanakyatim', [anakyatimController::class, 'importanakyatim'])->name('importanakyatim');
Route::post('/data/kirimanakyatim', [anakyatimController::class, 'kirimanakyatim'])->name('data.kirimanakyatim');

//untuk bayi 1 sampai 5 tahun
Route::get('/data/bayi1sampai5tahun', [bayi1sampai5tahunController::class, 'bayi1sampai5tahun']);
Route::get('/data/input-bayi1sampai5tahun', [bayi1sampai5tahunController::class, 'bayi1sampai5tahunInput']);
Route::get('/data/bayi1sampai5tahun/search', [bayi1sampai5tahunController::class, 'search']);
Route::post('/data/bayi1sampai5tahun/delete/{id}', [bayi1sampai5tahunController::class, 'destroy']);
Route::get('/data/bayi1sampai5tahun/detail/{id}', [bayi1sampai5tahunController::class, 'detail']);
Route::post('/data/bayi1sampai5tahun/update/{id}', [bayi1sampai5tahunController::class, 'update']);
Route::get('/get-data-by-nik/{NIK_CARI}', [bayi1sampai5tahunController::class, 'getDataByNIK']);
Route::post('/data/importbayi1sampai5tahun', [bayi1sampai5tahunController::class, 'importbayi1sampai5tahun'])->name('importbayi1sampai5tahun');
Route::post('/data/kirimbayi1sampai5tahun', [bayi1sampai5tahunController::class, 'kirimbayi1sampai5tahun'])->name('data.kirimbayi1sampai5tahun');

//untuk Ibu Hamil
Route::get('/data/ibuhamil', [ibuhamilController::class, 'Ibuhamil']);
Route::get('/data/input-ibuhamil', [ibuhamilController::class, 'ibuHamilInput']);
Route::get('/data/ibuhamil/search', [ibuhamilController::class, 'search']);
Route::post('/data/ibuhamil/delete/{id}', [ibuhamilController::class, 'destroy']);
Route::get('/data/ibuhamil/detail/{id}', [ibuhamilController::class, 'detail']);
Route::post('/data/ibuhamil/update/{id}', [ibuhamilController::class, 'update']);
Route::get('/get-data-by-nik/{NIK_CARI}', [ibuhamilController::class, 'getDataByNIK']);
Route::post('/data/importibuhamil', [ibuhamilController::class, 'importibuhamil'])->name('importibuhamil');
Route::post('/data/kirimIbuHamil', [ibuhamilController::class, 'kirimIbuHamil'])->name('data.kirimIbuHamil');

//untuk Masyarakat Miskin
Route::get('/data/miskin', [MiskinController::class, 'Miskin']);
Route::get('/data/miskin/search', [MiskinController::class, 'search']);
Route::post('/data/miskin/delete/{id}', [MiskinController::class, 'destroy']);
Route::get('/data/miskin/detail/{id}', [MiskinController::class, 'detail']);
Route::post('/data/miskin/update/{id}', [MiskinController::class, 'update']);
Route::get('/data/input-masyarakatmiskin', [MiskinController::class, 'masyarakatMiskinInput']);
Route::get('/get-data-by-nik/{NIK_CARI}', [MiskinController::class, 'getDataByNIK']);
Route::post('/data/importmiskin', [MiskinController::class, 'importmiskin'])->name('importmiskin');
Route::post('/data/kirimMasyarakatMiskin', [MiskinController::class, 'kirimMasyarakatMiskin'])->name('data.kirimMasyarakatMiskin');

//untuk Kelahiran
Route::get('/data/kelahiran', [KelahiranController::class, 'Kelahiran']);
Route::get('/data/input-kelahiran', [KelahiranController::class, 'KematianInput']);
Route::get('/data/kelahiran/search', [KelahiranController::class, 'search']);
Route::post('/data/kelahiran/delete/{id}', [KelahiranController::class, 'destroy']);
Route::get('/data/kelahiran/detail/{id}', [KelahiranController::class, 'detail']);
Route::post('/data/Kelahiran/update/{id}', [KelahiranController::class, 'update']);
Route::get('/get-data-by-nik/{NIK_CARI}', [KelahiranController::class, 'getDataByNIK']);
Route::post('/data/importkelahiran', [KelahiranController::class, 'importkelahiran'])->name('importkelahiran');
Route::post('/data/kirimKelahiran', [KelahiranController::class, 'kirimKelahiran'])->name('data.kirimKelahiran');

//untuk Kematian
Route::get('/data/kematian', [KematianController::class, 'Kematian']);
Route::get('/data/input-kematian', [KematianController::class, 'KematianInput']);
Route::get('/data/kematian/search', [KematianController::class, 'search']);
Route::post('/data/kematian/delete/{id}', [KematianController::class, 'destroy']);
Route::get('/data/kematian/detail/{id}', [KematianController::class, 'detail']);
Route::post('/data/Kematian/update/{id}', [KematianController::class, 'update'])->name('updateKematian');
Route::get('/get-data-by-nik/{NIK_CARI}', [KematianController::class, 'getDataByNIK']);
Route::post('/data/kirim', [KematianController::class, 'kirim'])->name('data.kirim');
Route::post('/data/importkematian', [KematianController::class, 'importkematian'])->name('importkematian');

//untuk Bkependudukan
Route::get('/data/kependudukan', [KependudukanController::class, 'Kependudukan']);
Route::get('/data/kependudukan/search', [KependudukanController::class, 'search']);
Route::get('/data/input', [KependudukanController::class, 'input']);
Route::post('/data/kependudukan/delete/{id}', [KependudukanController::class, 'destroy']);
Route::get('/data/kependudukan/detail/{id}', [KependudukanController::class, 'detail']);
Route::post('/data/Kependudukan/update/{id}', [KependudukanController::class, 'update']);
Route::post('/data/store', [KependudukanController::class, 'store'])->name('data.store');
Route::post('/data/import', [KependudukanController::class, 'import'])->name('import');
Route::resource('/penduduk', KependudukanController::class);
//  Control Management System Landing Page
require __DIR__ . '/landing_page/cms.php';
