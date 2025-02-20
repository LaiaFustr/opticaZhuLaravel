<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bloque_Horario extends Model
{
    protected $table='bloque_horario'

    protected $fillable=['horaInicio', 'horaFin'];

    public function calendario(){
        return $this->belongsTo(Calendario::class);
    }
}
