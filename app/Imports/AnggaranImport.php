<?php

namespace App\Imports;

use App\Models\Anggaran;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithStartRow;

class AnggaranImport implements ToModel, WithChunkReading, WithStartRow
{

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public $urut;

    public function __construct($urut)
    {
        $this->urut = 1;
    }

    public function model(array $row)
    {
        if($this->urut == 1){
            Anggaran::where('kode_skpd',$row[1])->delete();
            $this->urut++;
        }
        else{
            $this->urut++;
        }
        
        return new Anggaran([
            'kode_skpd' => $row[0],
            'nama_skpd' => $row[1],
            'kode_sub_skpd' => $row[2],
            'nama_sub_skpd' => $row[3],
            'kode_urusan' => $row[4],
            'nama_urusan' => $row[5],
            'kode_bidang_urusan' => $row[6],
            'nama_bidang_urusan' => $row[7],
            'kode_program' => $row[8],
            'nama_program' => $row[9],
            'kode_kegiatan' => $row[10],
            'nama_kegiatan' => $row[11],
            'kode_sub_kegiatan' => $row[12],
            'nama_sub_kegiatan' => $row[13],
            'kode_rekening' => $row[14],
            'nama_rekening' => $row[15],
            'nomor_spd' => $row[16],
            'periode_spd' => $row[17],
            'nilai_detail_spd' => (string)$row[18],
            'sisa_detail_spd' => (string)$row[19],
            'tahap_spd' => $row[20],
            'sub_tahap_spd' => $row[21],
            'status_tahap_spd' => $row[22],
            'dokumen' => $row[23],
            'jenis' => $row[24],
            'nomor_dokumen' => $row[25],
            'nomor_lpj' => $row[26],
            'status_lpj' => $row[27],
            'tgl_simpan' => $row[28],
            'tgl_dokumen' => $row[29],
            'bln_dokumen' => $row[30],
            'ket_dokumen' => $row[31],
            'nilai_realisasi' => (string)$row[32],
            'nilai_setoran' => (string)$row[33],
            'user_dokumen' => $row[34],
            'pegawai_dokumen' => $row[35],
            'nomor_spp' => $row[36],
            'tgl_spp' => $row[37],
            'nomor_spm' => $row[38],
            'tgl_spm' => $row[39],
            'nomor_sp2d' => $row[40],
            'nilai_sp2d' => (string)$row[41],
            'tgl_sp2d' => $row[42],
            'periode' => $row[43],
            'nilai_realisasi_lra' => (string)$row[44],
            'no_spp_gu' => $row[45],
            'nilai_spp_gu' => (string)$row[46]
        ]);
    }

    /**
     * @return int
     */
    public function chunkSize(): int
    {
        return 1000;
    }

    public function startRow(): int
    {
        return 2;
    }
}