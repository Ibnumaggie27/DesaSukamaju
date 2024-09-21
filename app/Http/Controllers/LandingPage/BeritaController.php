<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use App\Models\LandingPage\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        if ($request->search) {
            $beritas = Berita::with('author')->where('judul', 'like', '%' . $request->search . '%')->orWhere('deskripsi', 'like', '%' . $request->search . '%')->paginate(6);
        } else {
            $beritas = Berita::with('author')->paginate(6);
        }

        $berita_terbaru = Berita::with('author')->orderBy('created_at', 'desc')->limit(3)->get();

        $top_berita = Berita::whereTipe('Pengumuman')->get();

        return view('landing_page.informasi.berita.index', compact('beritas', 'berita_terbaru', 'top_berita'));
    }

    public function show($slug)
    {
        $berita = Berita::with('author')->whereSlug($slug)->first();
        $berita_terbaru = Berita::with('author')->orderBy('created_at', 'desc')->limit(4)->get();
        return view('landing_page.informasi.berita.detail', compact('berita', 'berita_terbaru'));
    }
}
