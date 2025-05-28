<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsoPrevisto extends Model
{
    protected $table = "usoprevisto";
    protected $fillable = ['idFicha', 'tiempodeuso', 'usodiarias'];
    public $timestamps = false;

    public function ficha()
    {
        return $this->belongsTo(Ficha::class, 'idFicha');
    }


}
