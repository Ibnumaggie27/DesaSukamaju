<?php

namespace App\Http\Controllers;

use App\Models\Tanggapan;
use Illuminate\Http\Request;

class TanggapanController extends Controller
{
    public function index()
    {
        return view('tanggapan.index', [
            'title' => 'Tanggapan pengaduan masyarakat',
            'tanggapan' => Tanggapan::orderBy('created_at', 'desc')->paginate(25),
            'url' => "tanggapan",
        ]);        
    }

    public function destroy($id)
    {
        if (Tanggapan::destroy($id)) {
            return response()->json(['success' => true, 'message' => 'Berhasil menghapus pengguna!']);
        } else {
            return response()->json(['success' => false, 'message' => 'Gagal menghapus pengguna!']);
        }
    }

    public function search(Request $request)
    {

        $search = $request->input('search');


        $pengaduan = Tanggapan::whereRaw("DATE_FORMAT(created_at, '%d %M %Y') LIKE '%" . $search . "%'")
            ->orWhere('id', 'LIKE', '%' . $search . '%')
            ->orWhere('status', 'LIKE', '%' . $search . '%')
            ->orWhereHas('petugas', function ($query) use ($search) {
                $query->where('nama', 'LIKE', '%' . $search . '%');
            })
            ->with('pengaduan:isi_laporan')
            ->get();

        return response()->json($pengaduan);
    }
}
