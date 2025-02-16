<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class EmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $empleados = [
            [
                'nombre' => 'Juan',
                'apellido'=> 'Flores',
                'dni'=> '994132127E',
                'direccion'=> 'Calle Teceje 21',
                'telefono'=> '645122567',
                'correo'=> 'jflower21@gmail.com',
                'rol'=> 'optometrista',
                'idOptica'=> 1,
            ],
            [
                'nombre' => 'Lisa',
                'apellido'=> 'Rivera',
                'dni'=> '20120314Y',
                'direccion'=> 'Calle Realeza 12',
                'telefono'=> '645122567',
                'correo'=> 'lisilis14@gmail.com',
                'rol'=> 'auxiliar',
                'idOptica'=> 1,
            ],
            [
                'nombre' => 'Emilio',
                'apellido'=> 'Delgado',
                'dni'=> '19760728F',
                'direccion'=> 'Calle Desengaño 21',
                'telefono'=> '915342525',
                'correo'=> 'emilioporfavor@gmail.com',
                'rol'=> 'optometrista',
                'idOptica'=> 2,
            ],
            [
                'nombre' => 'Juan',
                'apellido'=> 'Cuesta',
                'dni'=> '13299357X',
                'direccion'=> 'Calle Mirador 1',
                'telefono'=> '637450380',
                'correo'=> 'jcpresi@gmail.com',
                'rol'=> 'auxiliar',
                'idOptica'=> 2,
            ],
            [
                'nombre' => 'Sophia',
                'apellido'=> 'Sanchez',
                'dni'=> '236745422R',
                'direccion'=> 'Calle Plaza Manitas 34',
                'telefono'=> '645122634',
                'correo'=> 'sophii63@gmail.com',
                'rol'=> 'optometrista',
                'idOptica'=> 3,
            ],
            [   
                'nombre' => 'Hernan',
                'apellido'=> 'Mendez',
                'dni'=> '22221989R',
                'direccion'=> 'Calle Estatica 25',
                'telefono'=> '690134235',
                'correo'=> 'herteve12@gmail.com',
                'rol'=> 'auxiliar',
                'idOptica'=> 3,
            ],
            [
                'nombre' => 'Cristina',
                'apellido'=> 'Martinez',
                'dni'=> '294565321K',
                'direccion'=> 'Calle Cristobal',
                'telefono'=> '647153654',
                'correo'=> 'crizilla@gmail.com',
                'rol'=> 'optometrista',
                'idOptica'=> 1,
            ],
        ];

        $empleID = [];

        foreach ($empleados as $empleado){
            /*DB::table('empleados')->insert([
                'nombre'=> $empleado['nombre'],
                'apellido'=> $empleado['apellido'],
                'dni'=> $empleado['dni'],
                'direccion'=> $empleado['direccion'],
                'telefono'=> $empleado['telefono'],
                'correo'=> $empleado['correo'],*/
                $empleado['nombreUsuario']= 
                    substr($empleado['nombre'], 0, 2).
                    substr($empleado['apellido'], 0, 2).
                    substr($empleado['dni'], 0, 2);
   
                $empleado['contrasenia'] = Str::random(10);
            
            $empleado['id'] = DB::table('empleados')->insertGetId($empleado);
            $empleID[] = $empleado;
        }

        $auxiliares =[];
        $optometristas = [];


        foreach ($empleID as $emple){
            switch ($emple['rol']){
                case 'auxiliar':
                    $auxiliares[] =['idEmpleado' => $emple['id']];
                break;
                case 'optometrista':
                    $optometristas[] =['idEmpleado'=> $emple['id']];
                break;
            }

        }

        if(!empty($auxiliares)){
            DB::table('auxiliares')->insert($auxiliares);
        }
        if(!empty($optometristas)){
            DB::table('optometristas')->insert($optometristas);
        }
    }
}
