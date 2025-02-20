<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $table = "citas";

    protected $fillable = ['fecha', 'hora', 'descripcion'];
    protected $hidden = ['created_at', 'updated_at'];
    //las horas pueden ir asi para no poner los segundos
    //'hora'=>'datetime:H:i',

    public function optometrista()
    {
        return $this->belongsTo(Optometrista::class);
    }

    public function optica()
    {
        return $this->belongsTo(Optica::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
        
    }

    public function ficha(){
        return $this->hasOne(Ficha::class);
    }

}
