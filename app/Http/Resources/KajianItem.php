<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class KajianItem extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
      return [
    'tema_kajian' => $this->tema_kajian,
    'nama_ustad' => $this->nama_ustad,
    'lokasi_kajian' => $this->lokasi_kajian,
    'waktu' => $this->waktu
];
    }
}
