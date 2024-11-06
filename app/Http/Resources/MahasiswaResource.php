<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MahasiswaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'        => $this->id,
            'nim'       => $this->nim,
            'nama'      => $this->nama,
            'alamat'    => $this->alamat,
            'prodi'     => $this->prodi,
        ];
    }
}