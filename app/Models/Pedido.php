<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table='pedidos';
    protected $fillable=['fecha', 'estado', 'total', 'idProveedor', 'idOptica', 'fechapago'];


    public function proveedor(){
        return $this->belongsTo(Proveedor::class, 'idProveedor');
    }

    public function detallepedido(){
        return $this->hasMany(DetallePedido::class, "idPedido");
    }

    public function optica(){
        return $this->belongsTo(Optica::class, 'idOptica');
    }
}
