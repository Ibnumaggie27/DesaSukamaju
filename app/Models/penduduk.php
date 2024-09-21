<?php

// app\Models\Kependudukan.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class penduduk extends Model
{
    // Nama tabel dalam database
    protected $table = 'penduduks';

    // Kolom yang dapat diisi fillable
    protected $fillable = [
           'noKK',
           'namaLengkap',
           'NIK',
           'jk',
           'tempatLahir',
           'tanggalLahir',
           'agama',
           'pendidikan',
           'jenisPekerjaan',
           'goldar',
           'statusPerkawinan',
           'tanggalPerkawinan',
           'statusHubungan',
           'kewarganegaraan',
           'noPaspor',
           'noKitap',
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
           'tanggalDikeluarkan',
           'tipePenduduk',
           'statusNik',
    ];
    public function anakyatims()
    {
        return $this->hasMany(Anakyatim::class, 'penduduk_id');
    }
    public function kelahirans()
    {
        return $this->hasMany(kelahiran::class, 'penduduk_id');
    }
    public function miskins()
    {
        return $this->hasMany(miskin::class, 'penduduk_id');
    }
    public function hamils()
    {
        return $this->hasMany(ibuhamil::class, 'penduduk_id');
    }
    public function balita()
    {
        return $this->hasMany(bayi1sampai5tahun::class, 'penduduk_id');
    }
    public function pkh()
    {
        return $this->hasMany(pkh::class, 'penduduk_id');
    }
    public function bpnt()
    {
        return $this->hasMany(bpn::class, 'penduduk_id');
    }
    public function bps()
    {
        return $this->hasMany(bps::class, 'penduduk_id');
    }
    public function bbp()
    {
        return $this->hasMany(bbp::class, 'penduduk_id');
    }

}

