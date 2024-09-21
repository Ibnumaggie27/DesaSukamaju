<?php

namespace App\Services;

use App\Models\LandingPage\Berita;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class BeritaService {

    public function storeBerita($request) {
        $data = $request->all();

        $data['judul_singkat'] = Str::limit(strip_tags($request->judul), 30);
        $data['slug'] = Str::slug($data['judul'],'-');
        $data['deskripsi_singkat'] = Str::limit(strip_tags($request->deskripsi), 200);
        $data['author_id'] = auth()->user()->id;

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('cms/berita/thumbnail', 'public');
        }

        $berita = Berita::create($data);

        return $berita;
    }

    public function updateBerita($request, $berita){
        $data = $request->all();

        $data['judul_singkat'] = Str::limit(strip_tags($request->judul), 50);
        $data['slug'] = Str::slug($data['judul'],'-');
        $data['deskripsi_singkat'] = Str::limit(strip_tags($request->deskripsi), 200);
        $data['author_id'] = auth()->user()->id;

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('cms/berita/thumbnail', 'public');
        }

        $berita->update($data);

        return $berita;
        
    }

}