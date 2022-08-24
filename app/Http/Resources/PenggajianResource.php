<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PenggajianResource extends JsonResource
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
            'id' => $this->id,
            'nama_karyawan' => $this->karyawan->nama,
            'jabatan' => $this->karyawan->jabatan,
            'gaji_pokok' => $this->karyawan->gaji_pokok,
            'bonus_gaji' => $this->bonus,
            'potongan_gaji' => $this->potongan,
            'total_gaji' => $this->karyawan->gaji_pokok + $this->bonus - $this->potongan,
            'tanggal' => $this->tanggal,
            'keterangan' => $this->keterangan,
        ];
    }
}
