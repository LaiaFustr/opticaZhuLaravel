<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    //
    protected $table='horarios';
    protected $fillable=['nombre', 'horaApertura', 'horaCierre'];
    protected $hidden= ['created_at', 'updated_at'];

    public function admin(){
        return $this->belongsTo(Admin::class, 'idAdmin');
    }
}