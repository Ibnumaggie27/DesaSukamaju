<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use App\Models\LandingPage\ApbDesa;
use Illuminate\Support\Facades\DB;

class APBDesaController extends Controller
{
    public function index()
    {
        $apb = ApbDesa::paginate(6);
        $data = DB::table('apb_desas')->get();
        $latestJumlah = ApbDesa::latest('created_at')->value('jumlah');

        $apb_terbaru = ApbDesa::orderBy('created_at', 'desc')->limit(3)->get();
        return view('landing_page.informasi.APBDesa.index', compact('apb', 'apb_terbaru','data','latestJumlah'));
    }

    public function show(ApbDesa $apb)
    {
        return view('landing_page.informasi.APBDesa.detail', compact('apb'));
    }

}
