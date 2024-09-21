<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ibuhamil;
use App\Models\penduduk;
use Illuminate\Http\Request;
use App\Imports\ibuhamilImport;
use Maatwebsite\Excel\Facades\Excel;
class ibuhamilController extends Controller
{
    public function Ibuhamil()
    {
        return view('kelola_data_masyarakat/ibuhamil', [
            'ibuhamil'  => ibuhamil::orderBy('created_at', 'desc')->paginate(25),
            'title' => 'Ibu Hamil',
            'page','url'  => 'ibuhamil'
        ]);
    }
    public function ibuHamilInput()
    {
        return view('kelola_data_masyarakat/input', [
            'title' => 'Input ibu_hamil',
            'page'  => 'Input ibu_hamil'
        ]);
    }
    public function getDataByNIK($NIK_CARI)
    {
        $penduduk = penduduk::where('NIK', $NIK_CARI)->first();
        return response()->json($penduduk);
    }

    public function search(Request $request)
    {
        // Retrieve the search query from the request
        $search = $request->input('search');

        // Perform the search query
        $penduduk = ibuhamil::where('namaLengkap', 'LIKE', '%' . $search . '%')
            ->orWhere('NIK', 'LIKE', '%' . $search . '%')
            ->orWhere('jk', 'LIKE', '%' . $search . '%')
            ->get();

        // Return the filtered data as JSON response
        return response()->json($penduduk);
    }

    public function detail($id)
    {
        $penduduk = ibuhamil::find($id);

        if ($penduduk) {
            return view('kelola_data_masyarakat.detail', [
                'penduduk'  => $penduduk,
                'page' => 'ibuhamil',
                'title' => 'Ibu Hamil',
            ]);
        } else {
            return redirect()->back()->with('error', 'Penduduk not found');
        }
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([

            'NIK' => 'required|numeric',
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

        $penduduk = ibuhamil::findOrFail($id);
        $penduduk->update($validated);

        return redirect('data/miskin')->with('berhasil', 'Berhasil memperbarui data penduduk!');
    }

    public function kirimIbuHamil(Request $request)
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
            $penduduk = Penduduk::where('nik', $request->nik)->first();
    
            if (!$penduduk) {
                return redirect()->back()->with('error', 'Data penduduk tidak ditemukan.')->withInput();
            }
        
            // Periksa apakah NIK sudah terdaftar di tabel anakyatim
            $existsInibuhamil = ibuhamil::whereHas('penduduk', function ($query) use ($request) {
                $query->where('nik', $request->nik);
            })->exists();
        
            if ($existsInibuhamil) {
                return redirect()->back()->with('error', 'NIK sudah terdaftar di tabel Ibu Hamil.')->withInput();
            }
        
            // Simpan data ke tabel bayi1sampai5tahun
            $ibuhamil = new ibuhamil();
            $ibuhamil->penduduk_id = $penduduk->id;
            $ibuhamil->status = '1'; // Menggunakan penduduk_id sebagai kunci asing
           
            // Tambahkan kolom-kolom lain sesuai kebutuhan
            $ibuhamil->save();

            // Tampilkan pesan sukses atau redirect ke halaman tertentu
            return redirect('data/ibuhamil')->with('berhasil', 'Berhasil menambahkan ibu hamil!');
        }
    }

    public function importibuhamil(Request $request)
    {
        $data = $request->file('file');

        $namafile = $data->getClientOriginalName();
        $data->move('ibuhamilData', $namafile);

        Excel::import(new ibuhamilImport, \public_path('/ibuhamilData/' . $namafile));
        return \redirect()->back();
    }
    public function destroy($id)
    {
        if (ibuhamil::destroy($id)) {
            return response()->json(['success' => true, 'message' => 'Berhasil menghapus pengguna!']);
        } else {
            return response()->json(['success' => false, 'message' => 'Gagal menghapus pengguna!']);
        }
    }
    
}
