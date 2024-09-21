<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\penduduk;

class UserController extends Controller
{
    public function index()
    {
        return view('pengguna/index', [
            'title' => 'Data Masyarakat',
            'page'  => 'pengguna',
            'url' => "pengguna",
            'users' => User::where('level', 'masyarakat')->get()
        ]);
    }

    public function masyarakat()
    {
        return view('kelola_data_masyarakat/index', [
            'title' => 'Data Masyarakat',
            'page'  => 'masyarakat',
            'users' => User::where('level', 'masyarakat')->get()
        ]);
    }

    public function Kematian()
    {
        return view('kelola_data_masyarakat/kematian', [
            'title' => 'Data Kematian',
            'page'  => 'kematian'
        ]);
    }

    public function getDataByNIK($NIK)
    {
        $pendudukan = penduduk::find($NIK);
        return response()->json($pendudukan);
    }

    public function KematianInput()
    {
        return view('kelola_data_masyarakat/input', [
            'title' => 'Input Kematian',
            'page'  => 'Input Kematian'
        ]);
    }

    public function input()
    {
        return view('kelola_data_masyarakat/input', [
            'title' => 'input Kependudukan',
            'page'  => 'input',
            //'users' => User::where('level', 'masyarakat')->get()
        ]);
    }



    public function petugas()
    {
        return view('pengguna/index', [
            'title' => 'Data Petugas',
            'page'  => 'petugas',
            'url' => "petugas",

            'users' => User::where('level', '!=', 'masyarakat')->get()
        ]);
    }

    public function edit()
    {
    }

    public function create()
    {
        return view('pengguna/create', [
            'title' => 'Tambah Petugas',
        ]);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|min:6|unique:users',
            'nama' => 'required',
            'telepon' => 'required|min:11',
            'password' => 'required|min:6',
            'level' => 'required',
        ]);

        if (!$validated) {
            return redirect()->back()->with('gagal', 'Gagal menambahkan petugas!');
        }

        $validated['password'] = bcrypt($validated['password']);
        $berhasil = User::create($validated);
        if ($berhasil) {
            return redirect('pengguna/petugas')->with('berhasil', 'Berhasil menambahkan petugas!');
        } else {
            return redirect()->back()->with('gagal', 'Gagal menambahkan petugas!');
        }
    }

    public function update(Request $request, User $pengguna)
    {
        $validated = $request->validate([
            'username' => 'required|min:6|unique:users,username,' . $pengguna->id . ',id',
            'nama' => 'required',
            'telepon' => 'required|min:11',
            'level' => 'required',
        ]);

        if (!$validated) {
            return redirect()->back()->with('gagal', 'Gagal mengedit pengguna!');
        }

        $berhasil = $pengguna->update($validated);
        if ($berhasil) {
            return redirect()->back()->with('berhasil', 'Berhasil mengedit pengguna!');
        } else {
            return redirect()->back()->with('gagal', 'Gagal mengedit pengguna!');
        }
    }


    public function destroy($id)
    {
        if (User::destroy($id)) {
            return response()->json(['success' => true, 'message' => 'Berhasil menghapus pengguna!']);
        } else {
            return response()->json(['success' => false, 'message' => 'Gagal menghapus pengguna!']);
        }
    }
}
