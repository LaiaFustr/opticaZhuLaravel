<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parametros extends Model
{
    protected $table = 'parametros';
    protected $fillable =['idFicha', 'curvabase_od', 'diametro_od', 'potencia_od', 'eje_od', 'curvabase_oi', 'diametro_oi', 'potencia_oi', 'eje_oi'];
    public $timestamps = false;

    public function ficha()
    {
        return $this->belongsTo(Ficha::class, 'idFicha');
    }

}
