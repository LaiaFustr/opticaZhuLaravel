<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ishihara extends Model
{
    protected $table = 'ishihara';
    protected $fillable = ['idFicha', 'ishihara'];
    public $timestamps = false;

    public function ficha()
    {
        return $this->belongsTo(Ficha::class, 'idFicha');
    }
}
