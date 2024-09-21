<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use App\Models\LandingPage\ApbDesa;
use App\Models\LandingPage\Berita;
use Illuminate\Support\Facades\DB;

class BerandaController extends Controller
{
    public function index()
    {
        $apb = ApbDesa::all();
        $beritas = Berita::paginate(6);
        $chart = DB::table('apb_desas')->get();
        return view('landing_page.beranda.index', compact('apb','beritas','chart'));
    }
}
