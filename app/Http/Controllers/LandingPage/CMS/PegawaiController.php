<?php

namespace App\Http\Controllers\LandingPage\CMS;

use App\Http\Controllers\Controller;
use App\Models\LandingPage\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawais = Pegawai::all();
        return view('landing_page.cms.master_data.pegawai.index', compact('pegawais'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('landing_page.cms.master_data.pegawai.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'nama' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg'
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            $image_path = $request->file('foto')->store('public/pegawai', 'public');
            $data['foto'] = $image_path;
        }

        Pegawai::create($data);

        return redirect()->route('cms.pegawai.index')->with('success', 'Pegawai berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LandingPage\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function show(Pegawai $pegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LandingPage\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit(Pegawai $pegawai)
    {
        return view('landing_page.cms.master_data.pegawai.edit', compact('pegawai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LandingPage\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pegawai $pegawai)
    {
        $data = $request->all();
        $request->validate([
            'nama' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg'
        ]);


        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('public/public/pegawai', 'public');

            if ($pegawai->foto) {
                Storage::delete($pegawai->foto);
            }
        }

        $pegawai->update($data);

        return redirect()->route('cms.pegawai.index')->with('success', 'Pegawai berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LandingPage\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pegawai $pegawai)
    {
        Storage::delete($pegawai->foto);
        $pegawai->delete();
        return redirect()->route('cms.pegawai.index')->with('success', 'Pegawai berhasil dihapus');
    }
}
