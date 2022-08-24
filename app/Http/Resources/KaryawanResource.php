<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class KaryawanResource extends JsonResource
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
            'nip' => $this->nip,
            'nama' => $this->nama,
            'jenis_kelamin' => $this->jenis_kelamin,
            'jabatan' => $this->jabatan,
            'alamat' => $this->alamat,
            'gaji_pokok' => $this->gaji_pokok,
        ];
    }
}
