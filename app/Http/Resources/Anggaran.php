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
            'kode_sub_skpd' => $this->kode_sub_skpd,
            'nama_sub_skpd' => $this->nama_sub_skpd,
            
        ];
    }
}
