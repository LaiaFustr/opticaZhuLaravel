<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AVBinocular extends Model
{
    protected $table = 'avbinocular';
    protected $fillable = ['idFicha', 'esfera_od', 'ejecilindro_od', 'correccion_od', 'esfera_oi', 'ejecilindro_oi', 'correccion_oi', 'agudezavisual_binoc'];
    public $timestamps = false;

    public function ficha()
    {
        return $this->belongsTo(Ficha::class, 'idFicha');
    }
}
