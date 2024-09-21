<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\bpn;
use App\Models\penduduk;
use Illuminate\Http\Request;
use App\Imports\bpnImport;
use Maatwebsite\Excel\Facades\Excel;

class bpnController extends Controller
{
    public function bpn()
    {
        return view('kelola_data_masyarakat/bpn', [
            'bpn'  => bpn::orderBy('created_at', 'desc')->paginate(25),
            'title' => 'Data masyakarat Bantuan Pangan Non Tunai',
            'page','url'  => 'bpn'
        ]);
    }
    public function bpnInput()
    {
        return view('kelola_data_masyarakat/input', [
            'title' => 'Input bpn',
            'page'  => 'Input bpn'
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
        $penduduk = bpn::where('namaLengkap', 'LIKE', '%' . $search . '%')
            ->orWhere('NIK', 'LIKE', '%' . $search . '%')
            ->orWhere('jk', 'LIKE', '%' . $search . '%')
            ->get();

        // Return the filtered data as JSON response
        return response()->json($penduduk);
    }

    public function detail($id)
    {
        $penduduk = bpn::find($id);

        if ($penduduk) {
            return view('kelola_data_masyarakat.detail', [
                'penduduk'  => $penduduk,
                'page' => 'bpn',
                'title' => 'Bantuan Pangan Non Tunai',
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

        $penduduk = bpn::findOrFail($id);
        $penduduk->update($validated);

        return redirect('data/miskin')->with('berhasil', 'Berhasil memperbarui data penduduk!');
    }

    public function kirimbpn(Request $request)
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
        $existsInbpn = bpn::whereHas('penduduk', function ($query) use ($request) {
            $query->where('nik', $request->nik);
        })->exists();
    
        if ($existsInbpn) {
            return redirect()->back()->with('error', 'NIK sudah terdaftar di tabel Bantuan Pangan Non Tunai.')->withInput();
        }
        
            // Simpan data ke tabel bayi1sampai5tahun
            $bpn = new bpn();
            $bpn->penduduk_id = $penduduk->id;
            $bpn->status = '1'; // Menggunakan penduduk_id sebagai kunci asing
           
            // Tambahkan kolom-kolom lain sesuai kebutuhan
            $bpn->save();

            // Tampilkan pesan sukses atau redirect ke halaman tertentu
            return redirect('data/bpn')->with('berhasil', 'Berhasil menambahkan petugas!');
        }
    }

    public function importbpn(Request $request)
    {
        $data = $request->file('file');

        $namafile = $data->getClientOriginalName();
        $data->move('bpnData', $namafile);

        Excel::import(new bpnImport, \public_path('/bpndata/' . $namafile));
        return \redirect()->back();
    }
    public function destroy($id)
    {
        if (bpn::destroy($id)) {
            return response()->json(['success' => true, 'message' => 'Berhasil menghapus pengguna!']);
        } else {
            return response()->json(['success' => false, 'message' => 'Gagal menghapus pengguna!']);
        }
    }
}
