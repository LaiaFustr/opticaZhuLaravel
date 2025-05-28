<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ficha extends Model
{
    protected $table = 'fichas';
    protected $fillable = ['idOptometrista','idCliente','idCita','fecha','hora','descripcion'];
    //protected $hidden = ['created_at', 'updated_at'];
    public $timestamps = false;
    
    public function cita()
    {
        return $this->belongsTo(Cita::class, 'idCita');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'idCliente');
    }

    public function optometrista()
    {
        return $this->belongsTo(Optometrista::class, 'idOptometrista');
    }

    public function anamnesis(){
        return $this->hasOne(Anamnesis::class, 'idFicha');
    }
    public function graduacionanterior(){
        return $this->hasOne(GraduacionAnterior::class, 'idFicha');
    }
    public function avsincorreccion(){
        return $this->hasOne(AgudezaVisualSinCorreccion::class, 'idFicha');
    }
    public function avmonocular(){
        return $this->hasOne(AVMonocular::class, 'idFicha');
    } 
    public function avbinocular(){
        return $this->hasOne(AVBinocular::class, 'idFicha');
    } 
    public function reflejopupilar(){
        return $this->hasOne(ReflejoPupilar::class, 'idFicha');
    }
    public function ishihara(){
        return $this->hasOne(Ishihara::class, 'idFicha');
    }
    public function superficieocular(){
        return $this->hasOne(SuperficieOcular::class, 'idFicha');
    }
    public function parametros(){
        return $this->hasOne(Parametros::class, 'idFicha');
    }
    public function usoprevisto(){
        return $this->hasOne(UsoPrevisto::class, 'idFicha');
    }

    
}
