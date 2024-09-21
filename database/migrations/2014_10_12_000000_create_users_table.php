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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username',100);
            $table->string('email',100)->nullable();
            $table->string('password',100);
            $table->string('nama',50);
            $table->string('telepon',13)->nullable();
            $table->enum('level', ['admin', 'petugas', 'masyarakat','kesra','pemerintahan','pelayanan']);
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
        Schema::dropIfExists('users');
    }
};
