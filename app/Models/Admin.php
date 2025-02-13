<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table='admins';
    protected $fillable=['nombre','apellido','dni','direccion','telefono','correo','nombreUsuario','contrasenia'];
    protected $primaryKey = 'id';
    public $timestamps = false;  //indicamos que no queremos usar update_at y create_at en la base de datos.


}