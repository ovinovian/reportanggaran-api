<?php

namespace App\Imports;

use App\Models\Anggaran2;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
// use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithStartRow;

class Anggaran2Import implements ToModel, WithChunkReading, WithStartRow
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
            'urusan' => $row[0],
            'opd' => $row[1],
            'bidang_urusan' => $row[2],
            'sub_unit' => $row[3],
            'program' => $row[4],
            'kegiatan' => $row[5],
            'sub_kegiatan' => $row[6],
            'rekening' => $row[7],
            'nilai_rincian' => (string)$row[8],
            'nilai_realisasi' => (string)$row[9]
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