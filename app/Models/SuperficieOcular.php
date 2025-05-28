<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuperficieOcular extends Model
{
    protected $table = "superficieocular";
    protected $fillable = ['idFicha', 'estadocornea_od', 'peliculalagrimal_od', 'tincion_od', 'estadocornea_oi', 'peliculalagrimal_oi', 'tincion_oi'];
    public $timestamps = false;

    public function ficha()
    {
        return $this->belongsTo(Ficha::class, 'idFicha');
    }
}
