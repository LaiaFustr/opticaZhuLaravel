<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table='proveedores';
    protected $fillable = ['nif', "nombre", 'direccion', 'correo', 'telefono', 'codPostal'];

    public function articulos(){
        return $this->hasMany(Articulo::class, "idProveedor");
    }

    public function pedidos(){
        return $this->hasMany(Pedido::class, 'idProveedor');
    }
    
}
