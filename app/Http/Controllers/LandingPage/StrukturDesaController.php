<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use App\Models\LandingPage\Pegawai;
use Illuminate\Http\Request;

class StrukturDesaController extends Controller
{
    public function index()
    {
        $strukturs = Pegawai::all();
        return view('landing_page.pemerintah.struktur_desa.index', compact('strukturs'));
    }

    public function show(Pegawai $jabatan)
    {
        $strukturs = Pegawai::all();
        $jabatan->pegawai = $jabatan->pegawai->where('is_kepala_jabatan', true)->first();
        return view('landing_page.pemerintah.struktur_desa.index', compact('jabatan', 'strukturs'));
    }
}