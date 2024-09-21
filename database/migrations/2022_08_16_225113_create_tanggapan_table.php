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
        Schema::create('tanggapan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pengaduan_id')->unsigned();
            $table->foreign('pengaduan_id')->references('id')->on('pengaduan')->onUpdate('cascade')->onDelete('cascade');
            $table->string('status');
            $table->string('tanggapan',100);
            $table->unsignedBigInteger('petugas_id')->unsigned()->nullable();
            $table->foreign('petugas_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('set null');
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
        Schema::dropIfExists('tanggapan');
    }
};
