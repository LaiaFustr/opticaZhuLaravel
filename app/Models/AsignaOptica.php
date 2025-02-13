<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AsignaOptica extends Model
{
    protected $table = 'asignaropticas';
    protected $fillable = ['idEmpleado', 'idOptica', 'fecha'];
    protected $hidden = ['created_at', 'updated_at'];
}
