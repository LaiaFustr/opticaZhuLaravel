<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $table = "citas";

    protected $fillable = ['fecha', 'hora', 'descripcion'];
    protected $hidden = ['created_at', 'updated_at'];
    //las horas pueden ir asi para no poner los segundos
    //'hora'=>'datetime:H:i',

    public function cita()
    {
        return $this->belongsTo(Cita::class);
    }

    public function optica()
    {
        return $this->belongsTo(Optica::class);
    }

    //nombre de cliente de cita que se añadirá a ficha
    /* public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'idCliente');
    } */
}
