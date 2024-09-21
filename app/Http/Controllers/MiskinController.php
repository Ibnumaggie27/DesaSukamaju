<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\miskin;
use App\Models\penduduk;
use Illuminate\Http\Request;
use App\Imports\masyarakatmiskinImport;
use Maatwebsite\Excel\Facades\Excel;

class MiskinController extends Controller
{
    public function Miskin()
    {
        return view('kelola_data_masyarakat.masyarakatmiskin', [
            'miskin'  => miskin::orderBy('created_at', 'desc')->paginate(25),
            'title' => 'Data masyakarat miskin',
            'url'  => 'miskin',
            'page'  => 'Masyarakat Miskin'
        ]);
    }
    public function masyarakatMiskinInput()
    {
        return view('kelola_data_masyarakat.input', [
            'title' => 'Input miskin',
            'page'  => 'Input miskin'
        ]);
    }
    public function detail($id)
    {
        $penduduk = miskin::find($id);

        if ($penduduk) {
            return view('kelola_data_masyarakat.detail', [
                'penduduk'  => $penduduk,
                'title' => 'Penduduk Miskin',
                'page' => 'miskin',
            ]);
        } else {
            return redirect()->back()->with('error', 'Penduduk not found');
        }
    }

    public function search(Request $request)
    {
        // Retrieve the search query from the request
        $search = $request->input('search');

        // Perform the search query
        $penduduk = miskin::where('namaLengkap', 'LIKE', '%' . $search . '%')
            ->orWhere('NIK', 'LIKE', '%' . $search . '%')
            ->orWhere('jk', 'LIKE', '%' . $search . '%')
            ->get();

        // Return the filtered data as JSON response
        return response()->json($penduduk);
    }
    public function getDataByNIK($NIK_CARI)
    {
        $penduduk = penduduk::where('NIK', $NIK_CARI)->first();
        return response()->json($penduduk);
    }

    public function kirimMasyarakatMiskin(Request $request)
    { {
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
        $existsInmiskin = miskin::whereHas('penduduk', function ($query) use ($request) {
            $query->where('nik', $request->nik);
        })->exists();
    
        if ($existsInmiskin) {
            return redirect()->back()->with('error', 'NIK sudah terdaftar di tabel Masyarakat Miskin.')->withInput();
        }
            // Simpan data ke tabel kematian
            $miskin = new miskin();
            $miskin->penduduk_id = $penduduk->id;
            $miskin->status = '1';
            // Tambahkan kolom-kolom lain sesuai kebutuhan
            $miskin->save();

            // Tampilkan pesan sukses atau redirect ke halaman tertentu
            return redirect('data/miskin')->with('berhasil', 'Berhasil menambahkan masyarakat miskin!');
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

        $penduduk = miskin::findOrFail($id);
        $penduduk->update($validated);

        return redirect('data/miskin')->with('berhasil', 'Berhasil memperbarui data penduduk!');
    }

    public function importmiskin(Request $request)
    {
        $data = $request->file('file');

        $namafile = $data->getClientOriginalName();
        $data->move('miskinData', $namafile);

        Excel::import(new masyarakatmiskinImport, \public_path('/miskindata/' . $namafile));
        return \redirect()->back();
    }
    public function destroy($id)
    {
        if (miskin::destroy($id)) {
            return response()->json(['success' => true, 'message' => 'Berhasil menghapus pengguna!']);
        } else {
            return response()->json(['success' => false, 'message' => 'Gagal menghapus pengguna!']);
        }
    }
}
