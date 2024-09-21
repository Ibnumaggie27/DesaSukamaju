<?php

namespace App\Listeners;

use App\Events\KelahiranSimpan;
use App\Models\Penduduk;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ProsesKelahiran
{

    public function handle(KelahiranSimpan $event)
    {
        Penduduk::create([
            'noKK' => $event->noKK,
            'NIK' => $event->nik,
            'namaLengkap' => $event->namaLengkap,
            'jk' => $event->jk,
            'tempatLahir' => $event->tempatLahir,
            'tanggalLahir' => $event->tanggalLahir,
            'agama' => $event->agama,
            'namaAyah' => $event->namaAyah,
            'namaIbu' => $event->namaIbu,
            'namaKepalaKeluarga' => $event->namaKepalaKeluarga,
            'alamat' => $event->alamat,
            'kewarganegaraan' => $event->kewarganegaraan,
            'rt' => $event->rt,
            'rw' => $event->rw,
            'kodePos' => $event->kodePos,
            'desa' => $event->desa,
            'kecamatan' => $event->kecamatan,
            'kabupaten' => $event->kabupaten,
            'provinsi' => $event->provinsi,
        ]);
    }
}
