<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        Schema::create('kematians', function (Blueprint $table) {
            $table->id();
            $table->char('NIK', 17)->unique();
            $table->string('namaLengkap',30);
            $table->string('ttl',30);
            $table->string('ttm',30);
            $table->string('namaPelapor',30);
            $table->char('nikPelapor',17);
            $table->string('noDapatDihubungi',13);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kematians');
    }
};
