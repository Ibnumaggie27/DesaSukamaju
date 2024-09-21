<?php

namespace App\Services;

use App\Models\LandingPage\JabatanPegawai;

class JabatanService
{
    public function storeJabatan($request)
    {
        $validation = $request->validate([
            'nama' => 'required',
        ]);

        $jabatan = JabatanPegawai::create($validation);

        return $jabatan;
    }

    public function updateJabatan($request, $jabatan)
    {
        $validation = $request->validate([
            'nama' => 'required',
        ]);

        $jabatan->update($validation);

        return $jabatan;
    }
}
