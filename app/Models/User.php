<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
/* use Laravel\Passport\HasApiTokens;
 */


class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = ['nombre','apellido','dni','direccion','telefono',
    'correo','nombreUsuario','contrasenia','rol','idOptica','activo'
    ];

    public $timestamps=false;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'contrasenia',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'contrasenia' => 'hashed',
        ];
    }

    public function admin(){
        return $this->belongsTo(Admin::class,'idAdmin');
    }

    public function asignaOptica(){
        return $this->belongsTo(AsignaOptica::class,'idEmpleado');
    }

    public function optica(){
        return $this->belongsTo(Optica::class);
    }

    public function auxiliar(){
        return $this->hasMany(Optica::class, 'auxiliares', 'idEmpleado', 'id');
    }

    public function optometrista(){
        return $this->hasMany(Optica::class, /* 'optometristas', */ 'idEmpleado', 'id');
    }

    public function citas(){
        return $this->hasMany(Cita::class, 'idEmpleado');
    }

    public function getAuthIdentifierName(){
        return 'nombreUsuario';
    }

    public function getAuthPassword(){
        return $this->attributes['contrasenia'];
    }
}
