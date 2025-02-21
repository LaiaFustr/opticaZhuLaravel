<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FichaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            /* 'fecha'=> $this->fecha,
            'hora' => $this->hora,
            'descripcion' => $this->descripcion,
            'nombreCliente' => $this->cliente->nombre,
            'apellidoCliente' => $this->cliente->apellido, */
        ];
    }
}
