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
        Schema::create('detail_user', function (Blueprint $table) {
            $table->bigIncrements('id_detail');
            $table->string('nama')->nullable();
            $table->bigInteger('nik')->nullable();
            $table->bigInteger('nip')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('gender')->nullable();
            $table->string('telp')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('kota')->nullable();
            $table->string('provinsi')->nullable();
            $table->text('alamat')->nullable();
            $table->text('ktp')->nullable();
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
        Schema::dropIfExists('detail_user');
    }
};
