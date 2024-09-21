<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class kematian extends Model
{
    protected $table = 'kematians';

    // Kolom yang dapat diisi (fillable)
    protected $guarded = ['id'];
}
