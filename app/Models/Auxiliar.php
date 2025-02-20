<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Auxiliar extends Empleado
{
    public function auxiliar(){
        return $this->belongsToMany(Optica::class, 'empleados', 'id', 'idEmpleado');
    }
}
