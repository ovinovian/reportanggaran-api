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
        Schema::create('anggarans', function (Blueprint $table) {
            $table->id();
            $table->string('kode_skpd');
            $table->string('nama_skpd');
            $table->string('kode_sub_skpd');
            $table->string('nama_sub_skpd');
            $table->string('kode_urusan');
            $table->string('nama_urusan');
            $table->string('kode_bidang_urusan');
            $table->string('nama_bidang_urusan');
            $table->string('kode_program');
            $table->string('nama_program');
            $table->string('kode_kegiatan');
            $table->string('nama_kegiatan');
            $table->string('kode_sub_kegiatan');
            $table->string('nama_sub_kegiatan');
            $table->string('kode_rekening')->nullable();
            $table->string('nama_rekening')->nullable();
            $table->string('nomor_spd')->nullable();
            $table->string('periode_spd')->nullable();
            $table->float('nilai_detail_spd',14,2)->nullable()->default(0.00);
            $table->float('sisa_detail_spd',14,2)->nullable()->default(0.00);
            $table->string('tahap_spd')->nullable();
            $table->string('sub_tahap_spd')->nullable();
            $table->string('status_tahap_spd')->nullable();
            $table->string('dokumen')->nullable();
            $table->string('jenis')->nullable();
            $table->string('nomor_dokumen')->nullable();
            $table->string('nomor_lpj')->nullable();
            $table->string('status_lpj')->nullable();
            $table->dateTime('tgl_simpan')->nullable();
            $table->dateTime('tgl_dokumen')->nullable();
            $table->string('bln_dokumen')->nullable();
            $table->longText('ket_dokumen')->nullable();
            $table->float('nilai_realisasi',14,2)->nullable()->default(0.00);
            $table->float('nilai_setoran',14,2)->nullable()->default(0.00);
            $table->string('user_dokumen')->nullable();
            $table->string('pegawai_dokumen')->nullable();
            $table->string('nomor_spp')->nullable();
            $table->date('tgl_spp')->nullable();
            $table->string('nomor_spm')->nullable();
            $table->date('tgl_spm')->nullable();
            $table->string('nomor_sp2d')->nullable();
            $table->float('nilai_sp2d',14,2)->nullable()->default(0.00);
            $table->date('tgl_sp2d')->nullable();
            $table->string('periode')->nullable();
            $table->float('nilai_realisasi_lra',14,2)->nullable()->default(0.00);
            $table->string('no_spp_gu')->nullable();
            $table->float('nilai_spp_gu',14,2)->nullable()->default(0.00);
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
        Schema::dropIfExists('anggarans');
    }
};