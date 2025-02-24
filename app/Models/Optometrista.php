<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Optometrista extends Empleado
{    
    protected $table='optometristas';
    public $timestamps = false;
    public function optometrista(){
        return $this->belongsToMany(Optica::class, 'empleados', 'id', 'idEmpleado');
    }
}
