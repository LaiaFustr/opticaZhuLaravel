<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Optica extends Model
{
    protected $table='opticas';
    protected $fillable=['nombre', 'telefono', 'direccion', 'correo','num_Maquinas'];
    protected $hidden= ['created_at', 'updated_at'];

    public function admin(){
        return $this->belongsTo(Admin::class);
    }
}
