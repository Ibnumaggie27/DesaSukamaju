<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bayi1sampai5tahun extends Model
{
    use HasFactory;
    protected $table = 'bayi1sampai5tahun';

    // Kolom yang dapat diisi (fillable)
    protected $fillable = [
        'penduduk_id',
        'status',
    ];

    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class, 'penduduk_id');
    }
}
