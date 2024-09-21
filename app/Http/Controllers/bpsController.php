<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\bps;
use App\Models\penduduk;
use Illuminate\Http\Request;
use App\Imports\bpsImport;
use Maatwebsite\Excel\Facades\Excel;

class bpsController extends Controller
{
    public function bps()
    {
        return view('kelola_data_masyarakat/bps', [
            'bps'  => bps::orderBy('created_at', 'desc')->paginate(25),
            'title' => 'Data Bantuan Pangan Stunting',
            'page','url'  => 'bps'
        ]);
    }
    public function bpsInput()
    {
        return view('kelola_data_masyarakat/input', [
            'title' => 'Input bps',
            'page'  => 'Input bps'
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
        $penduduk = bps::where('namaLengkap', 'LIKE', '%' . $search . '%')
            ->orWhere('NIK', 'LIKE', '%' . $search . '%')
            ->orWhere('jk', 'LIKE', '%' . $search . '%')
            ->get();

        // Return the filtered data as JSON response
        return response()->json($penduduk);
    }

    public function detail($id)
    {
        $penduduk = bps::find($id);

        if ($penduduk) {
            return view('kelola_data_masyarakat.detail', [
                'penduduk'  => $penduduk,
                'page' => 'bps',
                'title' => 'Bantuan Pangan Stunting',
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

        $penduduk = bps::findOrFail($id);
        $penduduk->update($validated);

        return redirect('data/miskin')->with('berhasil', 'Berhasil memperbarui data penduduk!');
    }

    public function kirimbps(Request $request)
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
            $existsInbps = bps::whereHas('penduduk', function ($query) use ($request) {
                $query->where('nik', $request->nik);
            })->exists();
        
            if ($existsInbps) {
                return redirect()->back()->with('error', 'NIK sudah terdaftar di tabel Bantuan Pangan Stunting.')->withInput();
            }
    
        // Simpan data ke tabel bayi1sampai5tahun
        $bps = new bps();
        $bps->penduduk_id = $penduduk->id;
        $bps->status = '1'; // Menggunakan penduduk_id sebagai kunci asing
       
            // Tambahkan kolom-kolom lain sesuai kebutuhan
            $bps->save();

            // Tampilkan pesan sukses atau redirect ke halaman tertentu
            return redirect('data/bps')->with('berhasil', 'Berhasil menambahkan petugas!');
        }
    }

    public function importbps(Request $request)
    {
        $data = $request->file('file');

        $namafile = $data->getClientOriginalName();
        $data->move('bpsData', $namafile);

        Excel::import(new bpsImport, \public_path('/bpsdata/' . $namafile));
        return \redirect()->back();
    }
    public function destroy($id)
    {
        if (bps::destroy($id)) {
            return response()->json(['success' => true, 'message' => 'Berhasil menghapus pengguna!']);
        } else {
            return response()->json(['success' => false, 'message' => 'Gagal menghapus pengguna!']);
        }
    }
}
