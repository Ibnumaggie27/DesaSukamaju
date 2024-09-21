<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\bansos;
use App\Models\penduduk;
use Illuminate\Http\Request;
use App\Imports\bansosImport;
use Maatwebsite\Excel\Facades\Excel;

class bansosController extends Controller
{
    public function bansos()
    {
        return view('kelola_data_masyarakat/bansos', [
            'bansos'  => bansos::all(),
            'title' => 'Data masyakarat Bantuan Sosial',
            'page'  => 'bansos'
        ]);
    }
    public function bansosInput()
    {
        return view('kelola_data_masyarakat/input', [
            'title' => 'Input bansos',
            'page'  => 'Input bansos'
        ]);
    }
    public function getDataByNIK($NIK_CARI)
    {
        $penduduk = penduduk::where('NIK', $NIK_CARI)->first();
        return response()->json($penduduk);
    }

    public function kirimbansos(Request $request)
    { {
            $request->validate([
                'nik' => 'required|numeric',
                'namaLengkap' => 'required',
                'jk' => 'required',
                'tempatLahir' => 'required',
                'tanggalLahir' => 'required',
                'agama' => 'required',
                'namaAyah' => 'required',
                'namaIbu' => 'required',
                'namaKepalaKeluarga' => 'required',
                'alamat' => 'required',
                'rt' => 'required',
                'rw' => 'required',
                'kodePos' => 'required',
                'desa' => 'required',
                'kecamatan' => 'required',
                'kabupaten' => 'required',
                'provinsi' => 'required',
            ]);

            // Ambil data dari tabel kependudukan berdasarkan NIK
            $penduduk = penduduk::where('nik', $request->nik)->first();
    
        // Pastikan data penduduk ditemukan
        if (!$penduduk) {
            return redirect()->back()->with('gagal', 'Data penduduk tidak ditemukan');
        }
    
        // Simpan data ke tabel bayi1sampai5tahun
        $bansos = new bansos();
        $bansos->penduduk_id = $penduduk->id;
        $bansos->status = '1'; // Menggunakan penduduk_id sebagai kunci asing
       
            // Tambahkan kolom-kolom lain sesuai kebutuhan
            $bansos->save();

            // Tampilkan pesan sukses atau redirect ke halaman tertentu
            return redirect('data/bansos')->with('berhasil', 'Berhasil menambahkan bansos!');
        }
    }

    public function importbansos(Request $request)
    {
        $data = $request->file('file');

        $namafile = $data->getClientOriginalName();
        $data->move('public_html/bansosData', $namafile);
        $filePath = base_path('../public_html/bansosData/' . $namafile);
        Excel::import(new bansosImport, $filePath);
        return \redirect()->back();
    }
    public function destroy(bansos $item, $id)
    {
        if (bansos::destroy($id)) {
            return redirect()->back()->with('berhasil', 'Berhasil menghapus pengguna!');
        } else {
            return redirect()->back()->with('gagal', 'Gagal menghapus pengguna!');
        }
    }
}
