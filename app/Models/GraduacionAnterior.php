<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GraduacionAnterior extends Model
{
    protected $table = 'anamnesis';
    protected $fillable = ['idFicha', 'esfera_od', 'ejecilindro_od', 'agudezavisual_od', 'esfera_oi', 'ejecilindro_oi', 'agudezavisual_oi', 'agudezavisual_general', 'adicional'];
    public $timestamps = false;

    public function ficha()
    {
        return $this->belongsTo(Ficha::class, 'idFicha');
    }
}
