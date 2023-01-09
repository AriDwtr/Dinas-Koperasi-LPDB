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
        Schema::create('pengajuan', function (Blueprint $table) {
            $table->bigIncrements('id_pengajuan');
            $table->integer('id_user');
            $table->string('nama_usaha');
            $table->string('jenis_usaha');
            $table->string('bentuk_usaha');
            $table->string('kecamatan_usaha');
            $table->string('kelurahan_usaha');
            $table->string('kota_usaha');
            $table->string('provinsi_usaha');
            $table->text('alamat_usaha');
            $table->text('foto_usaha');
            $table->string('no_npwp');
            $table->text('npwp');
            $table->text('permohonan');
            $table->text('proposal');
            $table->text('akta');
            $table->text('keuangan');
            $table->text('legalitas');
            $table->string('status')->nullable();
            $table->text('keterangan')->nullable();
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
        Schema::dropIfExists('pengajuan');
    }
};
