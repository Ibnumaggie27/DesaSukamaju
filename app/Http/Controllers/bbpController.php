<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\bbp;
use App\Models\penduduk;
use Illuminate\Http\Request;
use App\Imports\bbpImport;
use Maatwebsite\Excel\Facades\Excel;


class bbpController extends Controller
{
    public function bbp()
    {
        return view('kelola_data_masyarakat/bbp', [
            'bbp'  => bbp::orderBy('created_at', 'desc')->paginate(25),
            'title' => 'Data masyakarat Bantuan Beras Pemerintah',
            'page','url'  => 'bbp'
        ]);
    }
    public function bbpInput()
    {
        return view('kelola_data_masyarakat/input', [
            'title' => 'Input bbp',
            'page'  => 'Input bbp'
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
        $penduduk = bbp::where('namaLengkap', 'LIKE', '%' . $search . '%')
            ->orWhere('NIK', 'LIKE', '%' . $search . '%')
            ->orWhere('jk', 'LIKE', '%' . $search . '%')
            ->get();

        // Return the filtered data as JSON response
        return response()->json($penduduk);
    }

    public function detail($id)
    {
        $penduduk = bbp::find($id);

        if ($penduduk) {
            return view('kelola_data_masyarakat.detail', [
                'penduduk'  => $penduduk,
                'page' => 'bbp',
                'title' => 'Bantuan Beras Pemerintah',
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

        $penduduk = bbp::findOrFail($id);
        $penduduk->update($validated);

        return redirect('data/miskin')->with('berhasil', 'Berhasil memperbarui data penduduk!');
    }

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
            $existsInbbp = bbp::whereHas('penduduk', function ($query) use ($request) {
                $query->where('nik', $request->nik);
            })->exists();
        
            if ($existsInbbp) {
                return redirect()->back()->with('error', 'NIK sudah terdaftar di tabel Bantuan Beras Pemerintah.')->withInput();
            }
    
        // Simpan data ke tabel bayi1sampai5tahun
        $bbp = new bbp();
        $bbp->penduduk_id = $penduduk->id;
        $bbp->status = '1'; // Menggunakan penduduk_id sebagai kunci asing
       
            // Tambahkan kolom-kolom lain sesuai kebutuhan
            $bbp->save();

            // Tampilkan pesan sukses atau redirect ke halaman tertentu
            return redirect('data/bbp')->with('berhasil', 'Berhasil menambahkan petugas!');
        }
    }

    public function importbbp(Request $request)
    {
        $data = $request->file('file');

        $namafile = $data->getClientOriginalName();
        $data->move('bbpData', $namafile);

        Excel::import(new bbpImport, \public_path('/bbpdata/' . $namafile));
        return \redirect()->back();
    }
    public function destroy($id)
    {
        if (bbp::destroy($id)) {
            return response()->json(['success' => true, 'message' => 'Berhasil menghapus pengguna!']);
        } else {
            return response()->json(['success' => false, 'message' => 'Gagal menghapus pengguna!']);
        }
    }
}
