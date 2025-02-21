<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table='clientes';
    protected $fillable=['nombre', 'apellido','dni', 'codPostal', 'telefono'/* , 'idAdmin' */];
    public $timestamps = false;

    public function admin(){
        return $this->belongsTo(Admin::class);
    }

    public function auxiliar(){
        return $this->belongsToMany(Auxiliar::class);
    }

    public function citas(){
        return $this->hasMany(Cita::class);
    }

    public function fichas(){
        return $this->hasMany(Ficha::class);
    }

}
