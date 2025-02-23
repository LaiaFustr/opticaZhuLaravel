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
        return $this->hasOne(Anamnesis::class);
    }
    public function graduacionanterior(){
        return $this->hasOne(GraduacionAnterior::class);
    }
    public function reflejopupilar(){
        return $this->hasOne(ReflejoPupilar::class);
    }
    public function ishihara(){
        return $this->hasOne(Ishihara::class);
    }
    
}
