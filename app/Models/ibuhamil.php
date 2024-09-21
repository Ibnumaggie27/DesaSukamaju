<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ibuhamil extends Model
{
    use HasFactory;
    protected $table = 'ibu_hamils';

    // Kolom yang dapat diisi (fillable)
    protected $fillable = [
        'NIK',
        'namaLengkap',
        'jk',
        'tempatLahir',
        'tanggalLahir',
        'agama',
        'namaAyah',
        'namaIbu',
        'namaKepalaKeluarga',
        'alamat',
        'rt',
        'rw',
        'kodePos',
        'desa',
        'kecamatan',
        'kabupaten',
        'provinsi',
    ];

    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class, 'penduduk_id');
    }
}
