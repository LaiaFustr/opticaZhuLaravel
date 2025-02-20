<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ficha extends Model
{
    protected $table = 'fichas';
    protected $fillable = ['idOptometrista','idCliente','idCita','fecha','hora','descripcion'];
    protected $hidden = ['created_at', 'updated_at'];



    public function cita(){
        return $this->belongsTo(Cita::class);
    }
   
    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }
}

 
    /*  public function anamnesis(){
        
        return $this->hasOne(Anamnesis::class, 'idFicha');
    }

    public function reflejoPupilar(){
        return $this->hasOne(ReflejoPupilar::class, 'idFicha');
    } */