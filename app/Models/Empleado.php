<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table='empleados';
    protected $fillable=['nombre', 'apellido','dni', 'direccion', 'telefono', 'correo', 'nombreUsuario','rol' ,'contrasenia'];
    //protected $hidden= ['created_at', 'updated_at'];

    public function admin(){
        return $this->belongsTo(Admin::class,'idAdmin');
    }

    public function cita(){
        return $this->belongsTo(Cita::class,'idCita');
    }

    public function asignaOptica(){
        return $this->belongsTo(AsignaOptica::class,'idEmpleado');
    }

    public function opticas(){
        return $this->belongsToMany(Optica::class, 'asignaropticas', 'idEmpleado', 'idOptica');
    }

    public function auxiliar(){
        return $this->belongsToMany(Optica::class, 'auxiliares', 'idEmpleado', 'id');
    }
}