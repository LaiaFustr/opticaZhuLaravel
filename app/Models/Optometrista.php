<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Optometrista extends Empleado
{
    public function optometrista(){
        return $this->belongsToMany(Optica::class, 'empleados', 'id', 'idEmpleado');
    }
}
