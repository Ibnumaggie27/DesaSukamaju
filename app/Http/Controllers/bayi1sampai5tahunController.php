<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\bayi1sampai5tahun;
use App\Models\penduduk;
use Illuminate\Http\Request;
use App\Imports\bayi1sampai5tahunImport;
use Maatwebsite\Excel\Facades\Excel;

class bayi1sampai5tahunController extends Controller
{
    public function bayi1sampai5tahun()
    {
        return view('kelola_data_masyarakat/bayi1sampai5tahun', [
            'bayi1sampai5tahun'  => bayi1sampai5tahun::orderBy('created_at', 'desc')->paginate(25),
            'title' => 'Data bayi 1 sampai 5 tahun',
            'page','url'  => 'bayi1sampai5tahun'
        ]);
    }
    public function bayi1sampai5tahunInput()
    {
        return view('kelola_data_masyarakat/input', [
            'title' => 'Input bayi',
            'page'  => 'Input bayi'
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
        $penduduk = bayi1sampai5tahun::where('namaLengkap', 'LIKE', '%' . $search . '%')
            ->orWhere('NIK', 'LIKE', '%' . $search . '%')
            ->orWhere('jk', 'LIKE', '%' . $search . '%')
            ->get();

        // Return the filtered data as JSON response
        return response()->json($penduduk);
    }

    public function detail($id)
    {
        $penduduk = bayi1sampai5tahun::find($id);

        if ($penduduk) {
            return view('kelola_data_masyarakat.detail', [
                'penduduk'  => $penduduk,
                'page' => 'bayi_1-5_tahun',
                'title' => 'Bayi 1 sampai 5 tahun',
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

        $penduduk = bayi1sampai5tahun::findOrFail($id);
        $penduduk->update($validated);

        return redirect('data/miskin')->with('berhasil', 'Berhasil memperbarui data penduduk!');
    }

     public function kirimbayi1sampai5tahun(Request $request)
    {
        $request->validate([
            'nik' => 'required',
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
        $existsInbayi1sampai5tahun = bayi1sampai5tahun::whereHas('penduduk', function ($query) use ($request) {
            $query->where('nik', $request->nik);
        })->exists();
    
        if ($existsInbayi1sampai5tahun) {
            return redirect()->back()->with('error', 'NIK sudah terdaftar di tabel balita.')->withInput();
        }
    
        // Simpan data ke tabel bayi1sampai5tahun
        $bayi1sampai5tahun = new bayi1sampai5tahun();
        $bayi1sampai5tahun->penduduk_id = $penduduk->id;
        $bayi1sampai5tahun->status = '1'; // Menggunakan penduduk_id sebagai kunci asing
       
        // Tambahkan kolom-kolom lain sesuai kebutuhan
        $bayi1sampai5tahun->save();
    
        // Tampilkan pesan sukses atau redirect ke halaman tertentu
        return redirect('data/bayi1sampai5tahun')->with('berhasil', 'Berhasil menambahkan bayi 1 sampai 5 tahun!');
    }

    public function importbayi1sampai5tahun(Request $request)
    {
        $data = $request->file('file');

        $namafile = $data->getClientOriginalName();
        $data->move('bayi1sampai5tahunData', $namafile);

        Excel::import(new bayi1sampai5tahunImport, \public_path('/bayi1sampai5tahundata/' . $namafile));
        return \redirect()->back();
    }
    public function destroy($id)
    {
        if (bayi1sampai5tahun::destroy($id)) {
            return response()->json(['success' => true, 'message' => 'Berhasil menghapus pengguna!']);
        } else {
            return response()->json(['success' => false, 'message' => 'Gagal menghapus pengguna!']);
        }
    }
}
