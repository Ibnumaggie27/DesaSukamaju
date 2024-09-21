<?php

namespace App\Http\Controllers\LandingPage\CMS;

use App\Http\Controllers\Controller;
use App\Models\LandingPage\ApbDesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


class APBDesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apb_desas = ApbDesa::all();
        return view('landing_page.cms.apb_desa.index', compact('apb_desas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // Check the 'type' parameter to determine the form to display
        $type = $request->input('type', 'apb');

        if ($type === 'pengeluaran') {
            return view('landing_page.cms.apb_desa.pengeluaran');
        } else {
            return view('landing_page.cms.apb_desa.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function validateApbDesa(Request $request)
    {
        $request->validate([
            'tahun' => 'required',
            'anggaran' => 'required',
        ]);
    }
    
    public function validateApbdPengeluaran(Request $request)
    {
        $request->validate([
            'judulPengeluaran' => 'required|string|max:100',
            'pengeluaran' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
        ]);
    }
    
    public function store(Request $request)
{
    $rules = [];
    
    if ($request->input('type') === 'apb') {
        $rules = [
            'tahun' => 'required',
            'anggaran' => 'required',
        ];
    } elseif ($request->input('type') === 'pengeluaran') {
        $rules = [
            'judulPengeluaran' => 'required',
            'pengeluaran' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
        ];
    }

    $request->validate($rules);

    $result = DB::table('apb_desas')->whereNotNull('jumlah')->exists();

    if ($result) {
        $totalPengeluaran = DB::table('apb_desas')->sum('pengeluaran');
        $jumlah = $totalPengeluaran + $request->pengeluaran;
    } else {
        $jumlah = $request->pengeluaran;
    }

    $data = [
        'tahun' => $request->tahun,
        'anggaran' => $request->anggaran,
        'pengeluaran' => $request->input('type') === 'pengeluaran' ? $request->pengeluaran : null,
        'judulPengeluaran' => $request->input('type') === 'pengeluaran' ? $request->judulPengeluaran : null,
        'jumlah' => $jumlah,
    ];

    if ($request->hasFile('gambar')) {
        $data['gambar'] = 'storage/' . $request->file('gambar')->store('public/apb_desa', 'public');
    }

    ApbDesa::create($data);

    return redirect()->route('cms.apb.index')->with('success', 'Data berhasil ditambah');
}


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LandingPage\ApbDesa  $apbDesa
     * @return \Illuminate\Http\Response
     */
    public function editPengeluaran (ApbDesa $apb){
        return view('landing_page.cms.apb_desa.editPengeluaran', compact('apb'));
    }
    public function updatePengeluaran(Request $request, ApbDesa $apb)
    {
        $request->validate([
            'judulPengeluaran' => 'required',
            'pengeluaran' => 'required',
        ]);

        // loop $request->all() if value is array convert to json
        $data = [];
        foreach ($request->all() as $key => $value) {
            if (is_array($value)) {
                $data[$key] = json_encode($value);
            } else {
                $data[$key] = $value;
            }
        }

        if ($request->hasFile('gambar')) {
            $data['gambar'] = 'storage/' . $request->file('gambar')->store('public/apb_desa', 'public');

            if ($apb->gambar) {
                Storage::delete(substr($apb->gambar, 8));
            }
        }
        
        $apb->update($data);

        return redirect()->route('cms.apb.index')->with('success', 'APB Desa berhasil diubah');
    }
    public function edit(ApbDesa $apb)
    {
        return view('landing_page.cms.apb_desa.edit', compact('apb'));
    }

    public function update(Request $request, ApbDesa $apb)
    {
        $request->validate([
            'tahun' => 'required',
            'anggaran' => 'required',
        ]);

        // loop $request->all() if value is array convert to json
        $data = [];
        foreach ($request->all() as $key => $value) {
            if (is_array($value)) {
                $data[$key] = json_encode($value);
            } else {
                $data[$key] = $value;
            }
        }

        $apb->update($data);

        return redirect()->route('cms.apb.index')->with('success', 'APB Desa berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LandingPage\ApbDesa  $apbDesa
     * @return \Illuminate\Http\Response
     */
    public function destroy(ApbDesa $apb)
    {
        if ($apb->gambar) {
            Storage::delete(substr($apb->gambar, 8));
        }

        $apb->delete();

        return redirect()->route('cms.apb.index')->with('success', 'APB Desa berhasil dihapus');
    }
}
