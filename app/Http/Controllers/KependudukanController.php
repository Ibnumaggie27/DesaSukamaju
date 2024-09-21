<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\penduduk;
use App\Imports\pendudukImport;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel; // Tambahkan use statement untuk model Kependudukan

class KependudukanController extends Controller
{
    public function index()
    {
        $penduduk = penduduk::all()->orderBy('created_at', 'desc')->get();
        return view('data.kependudukan', compact('penduduk'));
    }

    public function Kependudukan()
    {
        return view('kelola_data_masyarakat.kependudukan', [
            'penduduk'  => penduduk::orderBy('created_at', 'desc')->paginate(25),
            'title' => 'Data Kependudukan',
            'page', 'url'  => 'kependudukan',
            //'users' => User::where('level', 'masyarakat')->get()
        ]);
    }
    public function detail($id)
    {
        $penduduk = penduduk::find($id);

        if ($penduduk) {
            return view('kelola_data_masyarakat.detail', [
                'penduduk'  => $penduduk,
                'title' => 'Data Kependudukan',
                'page' => 'Kependudukan',
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
        $penduduk = Penduduk::where('namaLengkap', 'LIKE', '%' . $search . '%')
            ->orWhere('noKK', 'LIKE', '%' . $search . '%')
            ->orWhere('NIK', 'LIKE', '%' . $search . '%')
            ->orWhere('jk', 'LIKE', '%' . $search . '%')
            ->get();

        // Return the filtered data as JSON response
        return response()->json($penduduk);
    }

    public function input()
    {
        return view('kelola_data_masyarakat/input', [
            'title' => 'Input Kependudukan',
            'page'  => 'input',
            //'users' => User::where('level', 'masyarakat')->get()
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'noKK' => 'required',
            'namaLengkap' => 'required',
            'NIK' => 'required',
            'jk' => 'required',
            'tempatLahir' => 'required',
            'tanggalLahir' => 'required',
            'agama' => 'required',
            'pendidikan' => 'required',
            'jenisPekerjaan' => 'required',
            'goldar' => 'required',
            'statusPerkawinan' => 'required',
            'tanggalPerkawinan' => 'required',
            'statusHubungan' => 'required',
            'kewarganegaraan' => 'required',
            'noPaspor' => 'required',
            'noKitap' => 'required',
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
            'tanggalDikeluarkan' => 'required',
            'tipePenduduk' => 'required',
            'statusNik' => 'required',
        ]);

        penduduk::create($validated);
        return redirect('data/kependudukan')->with('berhasil', 'Berhasil menambahkan petugas!');
    }

    public function update(Request $request, $id)
{
    $validated = $request->validate([
        'noKK' => 'required',
        'namaLengkap' => 'required',
        'NIK' => 'required',
        'jk' => 'required',
        'tempatLahir' => 'required',
        'tanggalLahir' => 'required',
        'agama' => 'required',
        'pendidikan' => 'required',
        'jenisPekerjaan' => 'required',
        'goldar' => 'required',
        'statusPerkawinan' => 'required',
        'tanggalPerkawinan' => 'required',
        'statusHubungan' => 'required',
        'kewarganegaraan' => 'required',
        'noPaspor' => 'required',
        'noKitap' => 'required',
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
        'tanggalDikeluarkan' => 'required',
        'tipePenduduk' => 'required',
        'statusNik' => 'required',
    ]);

    $penduduk = Penduduk::findOrFail($id);
    $penduduk->update($validated);

    return redirect('data/kependudukan')->with('berhasil', 'Berhasil memperbarui data penduduk!');
}

    public function destroy($id)
    {
        if (Penduduk::destroy($id)) {
            return response()->json(['success' => true, 'message' => 'Berhasil menghapus pengguna!']);
        } else {
            return response()->json(['success' => false, 'message' => 'Gagal menghapus pengguna!']);
        }
    }



 public function import(Request $request)
{
    // Validasi file yang diunggah
    $request->validate([
        'file' => 'required|mimes:xlsx,xls', // Validasi tipe file yang diizinkan
    ]);

    // Dapatkan file yang diunggah
    $file = $request->file('file');

    // Pastikan file diunggah
    if (!$file) {
        return redirect()->back()->withErrors(['file' => 'No file uploaded.']);
    }

    // Dapatkan nama asli file
    $fileName = $file->getClientOriginalName();

    // Tentukan jalur tujuan untuk file
    $destinationPath = public_path('pendudukData');

    // Pindahkan file ke tujuan yang ditentukan
    $file->move($destinationPath, $fileName);

    // Bentuk jalur lengkap file
    $filePath = $destinationPath . '/' . $fileName;

    // Tentukan jalur cache dalam direktori public_html
    $cachePath = public_path('storage/framework/cache/laravel-excel');

    // Atur path cache Laravel Excel
    config(['excel.cache.path' => $cachePath]);

    try {
        // Buat instance import
        $import = new PendudukImport();

        // Impor data menggunakan Laravel Excel
        Excel::import($import, $filePath);
    } catch (\Exception $e) {
        // Tangani kesalahan dan kembalikan dengan pesan kesalahan
        return redirect()->back()->withErrors(['import' => 'Import failed: ' . $e->getMessage()]);
    }

    // Ambil pesan kesalahan dari objek import
    $errors = $import->getErrors();

    // Jika terdapat pesan kesalahan, simpan ke dalam session
    if (!empty($errors)) {
        return redirect()->back()->with('import_errors', $errors);
    }

    // Redirect kembali dengan pesan sukses
    return redirect()->back()->with('success', 'File imported successfully.');
}


}
