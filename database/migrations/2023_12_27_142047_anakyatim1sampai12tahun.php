<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anakyatim1sampai12tahun', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('penduduk_id'); // Ubah nama kolom menjadi 'penduduk_id'
            $table->foreign('penduduk_id')->references('id')->on('penduduks');
            $table->tinyInteger('status');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anakyatim1sampai12tahun');
    }
};
