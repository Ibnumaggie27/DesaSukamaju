<?php

namespace App\Imports;

use App\Models\kematian;
use Maatwebsite\Excel\Concerns\ToModel;

class kematianImport implements ToModel
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        return new kematian([
            'NIK' => $row[1],
            'namaLengkap' => $row[2],
            'ttl' => $row[3],
            'ttm' => $row[4],
            'namaPelapor' => $row[5],
            'nikPelapor' => $row[6],
            'noDapatDihubungi' => $row[7],
        ]);
    }
}
