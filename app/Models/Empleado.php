<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table='empleados';
    protected $fillable=['nombre', 'apellido','dni', 'direccion', 'telefono', 'correo', 'nombreUsuario','rol' ,'contrasenia'];
    //protected $hidden= ['created_at', 'updated_at'];

    public function optica(){
        return $this->belongsTo(Optica::class);
    }
}
