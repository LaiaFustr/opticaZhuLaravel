<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $table='articulos';
    protected $fillable = ["nombre", 'descripcion', 'stock', 'precio', 'idProveedor', 'idOptica'];

    public function proveedor(){
        return $this->belongsTo(Proveedor::class);
    }

    public function detallepedidos(){
        return $this->hasMany(DetallePedido::class);
    }
    
    public function optica(){
        return $this->belongsTo(Optica::class, "idOptica");
    }
}
