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
        Schema::create('anggaran2s', function (Blueprint $table) {
            $table->id();
            $table->text('urusan')->nullable();
            $table->text('opd')->nullable();
            $table->text('bidang_urusan')->nullable();
            $table->text('sub_unit')->nullable();
            $table->text('program')->nullable();
            $table->text('kegiatan')->nullable();
            $table->text('sub_kegiatan')->nullable();
            $table->text('rekening')->nullable();
            $table->text('nilai_rincian')->nullable();
            $table->text('nilai_realisasi')->nullable();
            $table->timestamps();
        });
        // Schema::create('anggaran2s', function (Blueprint $table) {
        //     $table->id();
        //     $table->text('kode_urusan')->nullable();
        //     $table->text('nama_urusan')->nullable();
        //     $table->text('kode_opd')->nullable();
        //     $table->text('nama_opd')->nullable();
        //     $table->text('kode_bidang_urusan')->nullable();
        //     $table->text('nama_bidang_urusan')->nullable();
        //     $table->text('kode_sub_unit')->nullable();
        //     $table->text('nama_sub_unit')->nullable();
        //     $table->text('kode_program')->nullable();
        //     $table->text('nama_program')->nullable();
        //     $table->text('kode_kegiatan')->nullable();
        //     $table->text('nama_kegiatan')->nullable();
        //     $table->text('kode_sub_kegiatan')->nullable();
        //     $table->text('nama_sub_kegiatan')->nullable();
        //     $table->text('kode_rekening')->nullable();
        //     $table->text('nama_rekening')->nullable();
        //     $table->text('nilai_rincian')->nullable();
        //     $table->text('nilai_realisasi')->nullable();
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anggaran2s');
    }
};