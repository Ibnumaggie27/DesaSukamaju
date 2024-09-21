<?php

namespace App\Http\Controllers\LandingPage\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\CMS\Berita\Store;
use App\Http\Requests\CMS\Berita\Update;
use App\Models\LandingPage\Berita;
use App\Services\BeritaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    protected $beritaService;
    
    public function __construct(BeritaService $beritaService)
    {
        $this->beritaService = $beritaService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $beritas = Berita::with('author')->get();
        return view('landing_page.cms.berita.index', compact('beritas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('landing_page.cms.berita.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'judul' => 'required|string|max:100',
            'gambar' => 'nullable|file|image',
            'deskripsi' => 'required|string',
            'tipe' => 'required|string',
            'views' => 'nullable|integer|min:0',
        ]);

        // Berikan instance Request ke service method
        $this->beritaService->storeBerita($request);

        // Redirect dengan pesan sukses
        return redirect()->route('cms.berita.index')->with('success', 'Berita berhasil ditambahkan');
    }

    public function CKEditorUpload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $request->validate([
                'upload' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $original_filename = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($original_filename, PATHINFO_FILENAME);
            $image_path = $request->file('upload')->store('cms/berita/desc', 'public');
            $url = asset('storage/' . $image_path);

            return response()->json(['fileName' => $fileName, 'uploaded' => true, 'url' => $url]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LandingPage\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function show(Berita $berita)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LandingPage\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function edit(Berita $berita)
    {
        return view('landing_page.cms.berita.edit', compact('berita'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LandingPage\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function update(Update $request, Berita $berita)
    {
        $this->beritaService->updateBerita($request, $berita);
        return redirect()->route('cms.berita.index')->with('success', 'Berita berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LandingPage\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function destroy(Berita $berita)
    {
        // jika gambarnya ada hapus
        if ($berita->gambar) {
            Storage::delete($berita->gambar);
        }

        $berita->delete();
        return redirect()->route('cms.berita.index')->with('success', 'Berita berhasil dihapus');
    }
}
