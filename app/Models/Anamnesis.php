<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anamnesis extends Model
{
    protected $table = 'anamnesis';
    protected $fillable = ['idFicha', 'edad', 'compensacion', 'ultimarevision', 'profesion', 'horas_pantalla'];
    public $timestamps = false;

    public function ficha()
    {
        return $this->belongsTo(Ficha::class, 'idFicha');
    }
}
