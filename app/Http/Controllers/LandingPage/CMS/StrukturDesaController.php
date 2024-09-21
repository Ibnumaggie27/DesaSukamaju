<?php

namespace App\Http\Controllers\landingPage\CMS;

use App\Http\Controllers\Controller;
use App\Models\LandingPage\JabatanPegawai;
use App\Models\LandingPage\Pegawai;
use Illuminate\Http\Request;

class StrukturDesaController extends Controller
{
    public function index()
    {
        $pegawais = Pegawai::all();

        // make query jabatan where id jabatan not in pegawai and is_kepala_jabatan = 1
        // $jabatans = JabatanPegawai::whereNotIn('id', Pegawai::where('is_kepala_jabatan', 1)->pluck('jabatan_pegawai_id'))->get();
        // $jabatans = Pegawai::all();
        // $pegawais_form = Pegawai::where('jabatan_pegawai_id', null)->get();
        return view('landing_page.cms.pemerintah.struktur_desa.index', compact('pegawais'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pegawai_id' => 'required',
            // 'jabatan_pegawai_id' => 'required',
        ]);

        // $jabatan  = Pegawai::with('pegawai')->findOrFail($request->jabatan); // rubah jadi jabaran aja

        // foreach ($jabatan->pegawai as $pegawai) {
        //     if ($pegawai->is_kepala_jabatan == 1) {
        //         return redirect()->back()->with('error', 'Ketua untuk jabatan atau struktur tersebut sudah terdaftar');
        //     }
        // }

        $pegawai = Pegawai::findOrFail($request->pegawai_id);

        $pegawai->update([
            // 'jabatan_pegawai_id' => $request->jabatan_pegawai_id,
            'is_kepala_jabatan' => $request->is_kepala_jabatan == 'on' ? '1' : '0'
        ]);

        return redirect()->back()->with('success', 'Berhasil menambahkan struktur desa');
    }

    public function edit(Pegawai $struktur_desa){
        $jabatans = JabatanPegawai::all();
        $pegawais_form = Pegawai::where('jabatan_pegawai_id', null)->get();
        return view('landing_page.cms.pemerintah.struktur_desa.edit', compact('struktur_desa', 'jabatans', 'pegawais_form'));
    }

    public function destroy(Pegawai $struktur_desa)
    {
        $struktur_desa->update([
            'jabatan_pegawai_id' => null,
            'is_kepala_jabatan' => 0
        ]);

        return redirect()->back()->with('success', 'Berhasil menghapus struktur desa');
    }

    public function upload_structure(Request $request){
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:5048'
        ]);

        $file = $request->file('image');
        $file_name = 'struktur_desa.png';
        $file->move('storage/struktur_desa', $file_name);

        return redirect()->back()->with('success', 'Berhasil mengupload struktur desa');
    }
}
