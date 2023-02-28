<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Anggaran extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            
            'kode_opd' => $this->kode_opd,
            'nama_opd' => $this->nama_opd,
            'total_rincian' =>$this->total_rincian,
            'nilai_realisasi' =>$this->total_realisasi,
            'persentase_capaian' => $this->persentase_capaian
            
        ];
    }
}