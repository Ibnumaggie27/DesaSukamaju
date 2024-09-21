<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use App\Models\LandingPage\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawais = Pegawai::with('jabatan_pegawai')->get();
        return view('landing_page.pemerintah.perangkat_desa.index', compact('pegawais'));
    }

    public function show(Pegawai $pegawai)
    {
        $pegawai->jabatan = $pegawai->with('jabatan_pegawai')->get();

        // make query for get 5 pegawai random except pegawai with id $pegawai->id
        $another_pegawai = Pegawai::with('jabatan_pegawai')->where('id', '!=', $pegawai->id)->inRandomOrder()->limit(5)->get();


        return view('landing_page.pemerintah.perangkat_desa.detail', compact('pegawai', 'another_pegawai'));
    }
}
