<?php

namespace App\Imports;

use App\Models\Anggaran;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\DB;

class AnggaranImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        $getSkpd = DB::table('anggarans')->get();

        $cek_skpd = $getSkpd->pluck('kode_skpd');

        if ($cek_skpd->contains($row[1]) == false) 
        {
            return new Anggaran([
                'kode_skpd' => $row[1],
                'nama_skpd' => $row[2],
                'kode_sub_skpd' => $row[3],
                'nama_sub_skpd' => $row[4],
                'kode_urusan' => $row[5],
                'nama_urusan' => $row[6],
                'kode_bidang_urusan' => $row[7],
                'nama_bidang_urusan' => $row[8],
                'kode_program' => $row[9],
                'nama_program' => $row[10],
                'kode_kegiatan' => $row[11],
                'nama_kegiatan' => $row[12],
                'kode_sub_kegiatan' => $row[13],
                'nama_sub_kegiatan' => $row[14],
                'kode_rekening' => $row[15],
                'nama_rekening' => $row[16],
                'nomor_spd' => $row[17],
                'periode_spd' => $row[18],
                'nilai_detail_spd' => $row[19],
                'sisa_detail_spd' => $row[20],
                'tahap_spd' => $row[21],
                'sub_tahap_spd' => $row[22],
                'status_tahap_spd' => $row[23],
                'dokumen' => $row[24],
                'jenis' => $row[25],
                'nomor_dokumen' => $row[26],
                'nomor_lpj' => $row[27],
                'status_lpj' => $row[28],
                'tgl_simpan' => $row[29],
                'tgl_dokumen' => $row[30],
                'bln_dokumen' => $row[31],
                'ket_dokumen' => $row[32],
                'nilai_realisasi' => $row[33],
                'nilai_setoran' => $row[34],
                'user_dokumen' => $row[35],
                'pegawai_dokumen' => $row[36],
                'nomor_spp' => $row[37],
                'tgl_spp' => $row[38],
                'nomor_spm' => $row[39],
                'tgl_spm' => $row[40],
                'nomor_sp2d' => $row[41],
                'nilai_sp2d' => $row[42],
                'tgl_sp2d' => $row[43],
                'periode' => $row[44],
                'nilai_realisasi_lra' => $row[45],
                'no_spp_gu' => $row[46],
                'nilai_spp_gu' => $row[47]
            ]);
        }
        else null; 




        
    }
}