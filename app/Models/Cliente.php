<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table='clientes';
    protected $fillable=['nombre', 'apellido','dni', 'codPostal', 'telefono'];
    //protected $hidden= ['created_at', 'updated_at'];

    public function admin(){
        return $this->belongsTo(Admin::class);
    }
}
