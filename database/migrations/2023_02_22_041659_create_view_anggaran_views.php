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
        \DB::statement("
            CREATE VIEW view_anggaran 
            AS
            SELECT
                anggaran2s.id AS id,
                SUBSTRING(anggaran2s.urusan,1,1) AS kode_urusan,
                SUBSTRING(anggaran2s.urusan,3) AS nama_urusan,
                if(substring(opd,23,1) = ' ',substring(opd,1,22), if(substring(opd,22,1) = ' ',substring(opd,1,21),substring(opd,1,20))) as kode_opd,
                if(substring(opd,23,1) = ' ',substring(opd,24), if(substring(opd,22,1) = ' ',substring(opd,23),substring(opd,22))) as nama_opd,
                SUBSTRING(anggaran2s.bidang_urusan,1,4) AS kode_bidang_urusan,
                SUBSTRING(anggaran2s.bidang_urusan,6) AS nama_bidang_urusan,
                if(SUBSTRING(sub_unit,23,1) = ' ', SUBSTRING(sub_unit,1,22), if(SUBSTRING(sub_unit,22,1) = ' ',SUBSTRING(sub_unit,1,21),SUBSTRING(sub_unit,1,20))) as kode_sub_unit,
                if(SUBSTRING(sub_unit,23,1) = ' ',SUBSTRING(sub_unit,24), if(SUBSTRING(sub_unit,22,1) = ' ',SUBSTRING(sub_unit,23),SUBSTRING(sub_unit,22))) as nama_sub_unit,
                SUBSTRING(anggaran2s.program,1,7) AS kode_program,
                SUBSTRING(anggaran2s.program,9) AS nama_program,
                SUBSTRING(anggaran2s.kegiatan,1,12) AS kode_kegiatan,
                SUBSTRING(anggaran2s.kegiatan,14) AS nama_kegiatan,
                SUBSTRING(anggaran2s.sub_kegiatan,1,15) AS kode_sub_kegiatan,
                SUBSTRING(anggaran2s.sub_kegiatan,17) AS nama_sub_kegiatan,
                SUBSTRING(anggaran2s.rekening,1,17) AS kode_rekening,
                SUBSTRING(anggaran2s.rekening,19) AS nama_rekening,
                if(anggaran2s.nilai_rincian < 1000000, anggaran2s.nilai_rincian*1000, anggaran2s.nilai_rincian) AS nilai_rincian,
                if(anggaran2s.nilai_realisasi < 1000000, anggaran2s.nilai_realisasi*1000, anggaran2s.nilai_realisasi) AS nilai_realisasi,
                anggaran2s.created_at AS created_at,
                anggaran2s.updated_at AS updated_at
            FROM
                anggaran2s
        ");
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('view_anggaran_views');
    }
};