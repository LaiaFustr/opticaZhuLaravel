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
            'id' => $this->id,
            'fecha' => $this->fecha,
            'hora' => $this->hora,
            'descripcion' => $this->descripcion,
            'idCita' => $this->cita->id,
            'nombreCliente' => $this->cliente->nombre,
            'apellidoCliente' => $this->cliente->apellido,
            'idOptometrista' => $this->optometrista->id,
        ];
    }
}
