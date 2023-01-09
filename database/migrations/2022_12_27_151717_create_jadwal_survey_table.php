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
        Schema::create('jadwal_survey', function (Blueprint $table) {
            $table->bigIncrements('id_jadwal');
            $table->integer('id_pengajuan');
            $table->integer('id_user');
            $table->string('status_survey')->nullable();
            $table->date('tanggal_survey')->nullable();
            $table->text('hasil_survey')->nullable();
            $table->text('dokumen_survey')->nullable();
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
        Schema::dropIfExists('jadwal_survey');
    }
};
