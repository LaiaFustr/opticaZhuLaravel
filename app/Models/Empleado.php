<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// use Laravel\Sanctum\HasApiTokens;
use Laravel\Passport\HasApiTokens;   

class Empleado extends Authenticatable
{
    use Notifiable;

    protected $table='empleados';
    protected $fillable=['nombre', 'apellido','dni', 'direccion', 'telefono', 'correo', 'nombreUsuario','rol' ,'contrasenia'];
    //protected $hidden= ['created_at', 'updated_at'];
    public $timestamps = false;

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
        return $this->hasMany(Optica::class, 'auxiliares', 'idEmpleado', 'id');
    }

    public function optometrista(){
        return $this->hasMany(Optica::class, 'optometristas', 'idEmpleado', 'id');
    }

    public function citas(){
        return $this->hasMany(Cita::class, 'idEmpleado');
    }

    public function getAuthIdentifierName(){
        return 'nombreUsuario';
    }

    public function getAuthPassword(){
        return $this->attributes[contrasenia];
    }
}