<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\pkh;
use App\Models\penduduk;
use Illuminate\Http\Request;
use App\Imports\pkhImport;
use Maatwebsite\Excel\Facades\Excel;

class pkhController extends Controller
{
    public function pkh()
    {
        return view('kelola_data_masyarakat/pkh', [
            'pkh'  => pkh::orderBy('created_at', 'desc')->paginate(25),
            'title' => 'Data program keluarga harapan',
            'page','url'  => 'pkh'
        ]);
    }
    public function pkhInput()
    {
        return view('kelola_data_masyarakat/input', [
            'title' => 'Input pkh',
            'page'  => 'Input pkh'
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
        $penduduk = pkh::where('namaLengkap', 'LIKE', '%' . $search . '%')
            ->orWhere('NIK', 'LIKE', '%' . $search . '%')
            ->orWhere('jk', 'LIKE', '%' . $search . '%')
            ->get();

        // Return the filtered data as JSON response
        return response()->json($penduduk);
    }

    public function detail($id)
    {
        $penduduk = pkh::find($id);

        if ($penduduk) {
            return view('kelola_data_masyarakat.detail', [
                'penduduk'  => $penduduk,
                'page' => 'pkh',
                'title' => 'Program Keluarga Harapan',
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

        $penduduk = pkh::findOrFail($id);
        $penduduk->update($validated);

        return redirect('data/miskin')->with('berhasil', 'Berhasil memperbarui data penduduk!');
    }

   public function kirimpkh(Request $request)
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

            $penduduk = Penduduk::where('nik', $request->nik)->first();
    
        if (!$penduduk) {
            return redirect()->back()->with('error', 'Data penduduk tidak ditemukan.')->withInput();
        }
    
        // Periksa apakah NIK sudah terdaftar di tabel anakyatim
        $existsInpkh = pkh::whereHas('penduduk', function ($query) use ($request) {
            $query->where('nik', $request->nik);
        })->exists();
    
        if ($existsInpkh) {
            return redirect()->back()->with('error', 'NIK sudah terdaftar di tabel Program Keluarga Harapan.')->withInput();
        }
        
            // Simpan data ke tabel bayi1sampai5tahun
            $pkh = new pkh();
            $pkh->penduduk_id = $penduduk->id;
            $pkh->status = '1'; // Menggunakan penduduk_id sebagai kunci asing
           
            // Tambahkan kolom-kolom lain sesuai kebutuhan
            $pkh->save();

            // Tampilkan pesan sukses atau redirect ke halaman tertentu
            return redirect('data/pkh')->with('berhasil', 'Berhasil menambahkan pkh!');
        }
    }

    public function importpkh(Request $request)
    {
        $data = $request->file('file');

        $namafile = $data->getClientOriginalName();
        $data->move('pkhData', $namafile);

        Excel::import(new pkhImport, \public_path('/pkhdata/' . $namafile));
        return \redirect()->back();
    }
    public function destroy($id)
    {
    if (pkh::destroy($id)) {
            return response()->json(['success' => true, 'message' => 'Berhasil menghapus pengguna!']);
        } else {
            return response()->json(['success' => false, 'message' => 'Gagal menghapus pengguna!']);
        }
    }
}
