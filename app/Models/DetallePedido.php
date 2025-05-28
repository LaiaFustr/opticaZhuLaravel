<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetallePedido extends Model
{
    protected $table='detallepedidos';
    protected $fillable =['idPedido', 'idArticulo', 'cantidad', 'precio', 'subtotal'];

    public function pedido(){
        return $this->belongsTo(Pedido::class, "idPedido");
    }

    public function articulo(){
        return $this->belongsTo(Articulo::class, 'idArticulo');
    }

}
