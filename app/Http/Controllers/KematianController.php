<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\kematian;
use App\Models\penduduk;
use Illuminate\Http\Request;
use App\Imports\kematianImport;
use Maatwebsite\Excel\Facades\Excel;

class KematianController extends Controller
{
    public function index()
    {
        //
    }
    public function Kematian()
    {
        return view('kelola_data_masyarakat/kematian', [
            'kematian'  => kematian::orderBy('created_at', 'desc')->paginate(25),
            'title' => 'Data Kematian',
            'page', 'url'  => 'kematian'
        ]);
    }
    public function KematianInput()
    {
        return view('kelola_data_masyarakat/input', [
            'title' => 'Input Kematian',
            'page'  => 'Input Kematian'
        ]);
    }
    public function getDataByNIK($NIK_CARI)
    {
        $penduduk = penduduk::where('NIK', $NIK_CARI)->first();
        return response()->json($penduduk);
    }

    public function detail($id)
    {
        $penduduk = kematian::find($id);

        if ($penduduk) {
            return view('kelola_data_masyarakat.detail', [
                'penduduk'  => $penduduk,
                'title' => 'Kematian',
                'page'   => "kematian",
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
        $penduduk = kematian::where('namaLengkap', 'LIKE', '%' . $search . '%')
            ->orWhere('NIK', 'LIKE', '%' . $search . '%')
            ->orWhere('ttl', 'LIKE', '%' . $search . '%')
            ->get();

        // Return the filtered data as JSON response
        return response()->json($penduduk);
    }

    public function kirim(Request $request)
    { {
            $validated = $request->validate([
                'NIK' => 'required',
                'namaLengkap' => 'required',
                'tempatLahir' => 'required',
                'tanggalLahir' => 'required',
                'tempatKematian' => 'required',
                'tanggalKematian' => 'required',
                'namaPelapor' => 'required',
                'nikPelapor' => 'required',
                'noDapatDihubungi' => 'required',
            ]);

            kematian::create($validated);
            return redirect('data/kematian')->with('berhasil', 'Berhasil menambahkan petugas!');
        }
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'NIK' => 'required|numeric',
            'namaLengkap' => 'required',
            'tempatLahir' => 'required',
            'tanggalLahir' => 'required',
            'tempatKematian' => 'required',
            'tanggalKematian' => 'required',
            'namaPelapor' => 'required',
            'nikPelapor' => 'required',
            'noDapatDihubungi' => 'required',
        ]);

        $kematian = kematian::findOrFail($id);
        if ($kematian->update($validated)) {
            return redirect('data/kematian')->with('berhasil', 'Berhasil memperbarui data penduduk!');
        } else {
            return redirect('data/kematian')->with('gagal', 'Gagal memperbarui data penduduk!');
        }
    }

    public function importkematian(Request $request)
    {
        $data = $request->file('file');

        $namafile = $data->getClientOriginalName();
        $data->move('kematianData', $namafile);

        Excel::import(new kematianImport, \public_path('/kematiandata/' . $namafile));
        return \redirect()->back();
    }
    public function destroy($id)
    {
        if (kematian::destroy($id)) {
            return response()->json(['success' => true, 'message' => 'Berhasil menghapus pengguna!']);
        } else {
            return response()->json(['success' => false, 'message' => 'Gagal menghapus pengguna!']);
        }
    }
}
