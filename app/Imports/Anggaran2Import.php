<?php

namespace App\Imports;

use App\Models\Anggaran2;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class Anggaran2Import implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public $urut;
    
    public function __construct()
    {
        $this->urut = 1;

        if($this->urut == 1){
            $this->hapus = Anggaran2::truncate();
            $this->urut++;
        }
        else{
            $this->urut++;
        }
    }

    public function model(array $row)
    {
        
        return new Anggaran2([
            'urusan' => $row[1],
            'opd' => $row[2],
            'bidang_urusan' => $row[3],
            'sub_unit' => $row[4],
            'program' => $row[5],
            'kegiatan' => $row[6],
            'sub_kegiatan' => $row[7],
            'rekening' => $row[8],
            'nilai_rincian' => $row[9],
            'nilai_realisasi' => $row[10]
        ]);
        
        // return new Anggaran2([
        //     'kode_urusan' => Str::substr($row[1],0),
        //     'nama_urusan' => Str::substr($row[1],2),
        //     'kode_opd' => Str::substr($row[2],0,21),
        //     'nama_opd' => Str::substr($row[2],23),
        //     'kode_bidang_urusan' => Str::substr($row[3],0,3),
        //     'nama_bidang_urusan' => Str::substr($row[3],5),
        //     'kode_sub_unit' => Str::substr($row[4],0,21),
        //     'nama_sub_unit' => Str::substr($row[4],23),
        //     'kode_program' => Str::substr($row[5],0,6),
        //     'nama_program' => Str::substr($row[5],8),
        //     'kode_kegiatan' => Str::substr($row[6],0,11),
        //     'nama_kegiatan' => Str::substr($row[6],13),
        //     'kode_sub_kegiatan' => Str::substr($row[7],0,14),
        //     'nama_sub_kegiatan' => Str::substr($row[7],16),
        //     'kode_rekening' => Str::substr($row[8],0,16),
        //     'nama_rekening' => Str::substr($row[8],18),
        //     'nilai_rincian' => $row[9],
        //     'nilai_realisasi' => $row[10]
        // ]);
    }

}