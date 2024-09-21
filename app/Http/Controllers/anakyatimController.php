<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\anakyatim;
use App\Models\penduduk;
use Illuminate\Http\Request;
use App\Imports\anakyatimImport;
use Maatwebsite\Excel\Facades\Excel;

class anakyatimController extends Controller
{
    public function anakyatim()
    {
        return view('kelola_data_masyarakat/anakyatim', [
            'anakyatim'  => anakyatim::orderBy('created_at', 'desc')->paginate(25),
            'title' => 'Data masyakarat Anak Yatim 1 Sampai 12 Tahun',
            'page','url'  => 'anakyatim'
        ]);
    }
    public function anakyatimInput()
    {
        return view('kelola_data_masyarakat/input', [
            'title' => 'Input yatim',
            'page'  => 'Input yatim'
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
        $penduduk = anakyatim::where('namaLengkap', 'LIKE', '%' . $search . '%')
            ->orWhere('NIK', 'LIKE', '%' . $search . '%')
            ->orWhere('jk', 'LIKE', '%' . $search . '%')
            ->get();

        // Return the filtered data as JSON response
        return response()->json($penduduk);
    }

    public function detail($id)
    {
        $penduduk = anakyatim::find($id);

        if ($penduduk) {
            return view('kelola_data_masyarakat.detail', [
                'penduduk'  => $penduduk,
                'page' => 'anakyatim',
                'title' => 'Anak Yatim 1 Sampai 12 Tahun'
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

        $penduduk = anakyatim::findOrFail($id);
        $penduduk->update($validated);

        return redirect('data/miskin')->with('berhasil', 'Berhasil memperbarui data penduduk!');
    }

    public function kirimanakyatim(Request $request)
    {{
        // Validasi data
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
    
        // Periksa keberadaan NIK di tabel penduduks
        $penduduk = Penduduk::where('nik', $request->nik)->first();
    
        if (!$penduduk) {
            return redirect()->back()->with('error', 'Data penduduk tidak ditemukan.')->withInput();
        }
    
        // Periksa apakah NIK sudah terdaftar di tabel anakyatim
        $existsInAnakyatim = Anakyatim::whereHas('penduduk', function ($query) use ($request) {
            $query->where('nik', $request->nik);
        })->exists();
    
        if ($existsInAnakyatim) {
            return redirect()->back()->with('error', 'NIK sudah terdaftar di tabel anakyatim.')->withInput();
        }
    
        // Simpan data ke tabel anakyatim
        $anakyatim = new Anakyatim();
        $anakyatim->penduduk_id = $penduduk->id;
        $anakyatim->status = '1'; // Status atau kolom lain sesuai kebutuhan
    
        // Tambahkan kolom-kolom lain sesuai kebutuhan
        $anakyatim->save();
    
        // Tampilkan pesan sukses atau redirect ke halaman tertentu
        return redirect('data/anakyatim')->with('berhasil', 'Berhasil menambahkan anak yatim!');
    }
    }

    public function importanakyatim(Request $request)
    {
        $data = $request->file('file');

        $namafile = $data->getClientOriginalName();
        $data->move('anakyatimData', $namafile);

        Excel::import(new anakyatimImport, \public_path('/anakyatimdata/' . $namafile));
        return \redirect()->back();
    }
    public function destroy($id)
    {
        if (anakyatim::destroy($id)) {
            return response()->json(['success' => true, 'message' => 'Berhasil menghapus pengguna!']);
        } else {
            return response()->json(['success' => false, 'message' => 'Gagal menghapus pengguna!']);
        }
    }
}
