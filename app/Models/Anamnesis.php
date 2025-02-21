<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anamnesis extends Model
{
    public function ficha()
    {
        return $this->belongsTo(Ficha::class, 'idFicha');
    }
}
