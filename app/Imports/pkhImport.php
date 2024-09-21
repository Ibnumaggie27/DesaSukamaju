<?php

namespace App\Imports;

use App\Models\pkh;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class pkhImport implements WithHeadingRow, ToModel
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        return new pkh([
            'NIK' => $row['nik'],
            'namaLengkap' => $row['nama_lengkap'],
            'jk' => $row['jenis_kelamin'],
            'tempatLahir' => $row['tempat_lahir'],
            'tanggalLahir' => $row['tanggal_lahir'],
            'agama' => $row['agama'],
            'namaAyah' => $row['nama_ayah'],
            'namaIbu' => $row['nama_ibu'],
            'namaKepalaKeluarga' => $row['nama_kepala_keluarga'],
            'alamat' => $row['alamat'],
            'rt' => $row['rt'],
            'rw' => $row['rw'],
            'kodePos' => $row['kode_pos'],
            'desa' => $row['desa'],
            'kecamatan' => $row['kecamatan'],
            'kabupaten' => $row['kabupaten'],
            'provinsi' => $row['provinsi'],
        ]);
    }
}
