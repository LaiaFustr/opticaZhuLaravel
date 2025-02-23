<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReflejoPupilar extends Model
{
    protected $table = 'reflejopupilar';
    protected $fillable = ['idFicha', 'iguales', 'redondas', 'reaccionan', 'reaccLuz', 'acomodacion'];
    public $timestamps = false;
    public function ficha()
    {
        return $this->belongsTo(Ficha::class, 'idFicha');
    }
}
