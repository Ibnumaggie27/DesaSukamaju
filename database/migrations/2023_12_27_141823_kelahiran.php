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
        Schema::create('kelahirans', function (Blueprint $table) {
            $table->id();
            $table->char('noKK',17);
            $table->string('namaLengkap',30);
            $table->char('NIK',17)->unique();
            $table->tinyInteger('jk');
            $table->string('tempatLahir',50);
            $table->date('tanggalLahir');
            $table->tinyInteger('agama');
            $table->string('namaAyah',30);
            $table->string('namaIbu',30);
            $table->string('namaKepalaKeluarga',30);
            $table->string('alamat',100);
            $table->tinyInteger('kewarganegaraan');
            $table->string('rt',4);
            $table->string('rw',4);
            $table->string('kodePos',7);
            $table->string('desa',30);
            $table->string('kecamatan',30);
            $table->string('kabupaten',30);
            $table->string('provinsi',30);
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
        Schema::dropIfExists('kelahirans');
    }
};
