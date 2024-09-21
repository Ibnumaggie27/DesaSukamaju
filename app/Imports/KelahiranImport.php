<?php

namespace App\Imports;

use App\Models\Kelahiran;
use Maatwebsite\Excel\Concerns\ToModel;

class KelahiranImport implements ToModel
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        return new kelahiran([
            'NIK' => $row[1],
            'namaLengkap' => $row[2],
        ]);
    }
}
