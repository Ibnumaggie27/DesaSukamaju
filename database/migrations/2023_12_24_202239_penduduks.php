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
        Schema::create('penduduks', function (Blueprint $table) {
            $table->id()->nullable();
            $table->char('noKK',17)->nullable();
            $table->string('namaLengkap',30)->nullable();
            $table->char('NIK',17)->unique()->nullable();
            $table->tinyInteger('jk')->nullable();
            $table->string('tempatLahir',50)->nullable();
            $table->date('tanggalLahir')->nullable();
            $table->tinyInteger('agama')->nullable();
            $table->string('pendidikan',10)->nullable();
            $table->string('jenisPekerjaan',20)->nullable();
            $table->tinyInteger('goldar')->nullable();
            $table->tinyInteger('statusPerkawinan')->nullable();
            $table->date('tanggalPerkawinan')->nullable();
            $table->string('statusHubungan',10)->nullable();
            $table->tinyInteger('kewarganegaraan')->nullable();
            $table->string('noPaspor',10)->nullable();
            $table->string('noKitap',10)->nullable();
            $table->string('namaAyah',30)->nullable();
            $table->string('namaIbu',30)->nullable();
            $table->string('namaKepalaKeluarga',30)->nullable();
            $table->string('alamat',100)->nullable();
            $table->string('rt',4)->nullable();
            $table->string('rw',4)->nullable();
            $table->string('kodePos',7)->nullable();
            $table->string('desa',30)->nullable();
            $table->string('kecamatan',30)->nullable();
            $table->string('kabupaten',30)->nullable();
            $table->string('provinsi',30)->nullable();
            $table->date('tanggalDikeluarkan')->nullable();
            $table->tinyInteger('tipePenduduk')->nullable();
            $table->tinyInteger('statusNik')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('penduduks');
    }
};
