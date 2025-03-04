<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $table = "citas";

    protected $fillable = ['fecha', 'hora', 'descripcion', 'idCliente', 'idOptica'];
    public $timestamps = false;
    //las horas pueden ir asi para no poner los segundos
    //'hora'=>'datetime:H:i',

    public function optometrista()
    {
        return $this->belongsTo(Optometrista::class, 'idOptometrista');
    }

    public function optica()
    {
        return $this->belongsTo(Optica::class, 'idOptica');
    }

    /* public function bloqueHorario()
    {
        return $this->belongsTo(Bloque_Horario::class);
    } */

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'idCliente');
    }
    //nombre de cliente de cita que se añadirá a ficha

    public function ficha()
    {
        return $this->hasOne(Ficha::class);
    }
}
