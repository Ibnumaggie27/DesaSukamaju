<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class kelahiran extends Model
{
    protected $table = 'kelahirans';

    // Kolom yang dapat diisi (fillable)
    protected $guarded = ['id'];
}
