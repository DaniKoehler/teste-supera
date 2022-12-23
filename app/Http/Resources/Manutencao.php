<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Manutencao extends JsonResource
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
            'descricao' => $this->descricao,
            'valor' => $this->valor,
            'data' => $this->data,
            'veiculo' => $this->veiculo->placa
        ];
    }
}
