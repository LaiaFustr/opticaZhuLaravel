<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users =[
            [
                'id' => 1,
                'nombre' => 'Manuel',
                'apellido' => 'Rodriguez Alonso',
                'dni'=> '45275313M',
                'direccion'=> 'Calle Torno del Hospital 10',
                'telefono'=> '671452787',
                'correo'=> 'manueladmin@gmail.com',
                'rol' => 'admin',
                'idOptica'=> 3,
                'activo'=>true,
            ],
            [
                'id' => 2,
                'nombre' => 'Jordi',
                'apellido' => 'Paillacho',
                'dni'=> '21006147V',
                'direccion'=> 'Calle Totalmente Real 67',
                'telefono'=> '616161616',
                'correo'=> 'jordiadmin@gmail.com',
                'rol' => 'admin',
                'idOptica'=> 2,
                'activo'=>true,
            ],
            [
                'id' => 3,
                'nombre' => 'Laia',
                'apellido' => 'Fuster',
                'dni'=> '43558634R',
                'direccion'=> 'Calle Existente 12',
                'telefono'=> '634153226',
                'correo'=> 'laiaadmin@gmail.com',
                'rol' => 'admin',
                'idOptica'=> 1,
                'activo'=>true,
            ],
            [
                'id' => 4,
                'nombre' => 'Oscar',
                'apellido' => 'Mateu',
                'dni'=> '23478457T',
                'direccion'=> 'Calle Enserio que existe 9',
                'telefono'=> '613125327',
                'correo'=> 'oscaradmin@gmail.com',
                'rol' => 'admin',
                'idOptica'=> 2,
                'activo'=>true,
            ],
            [
                'id' => 5,
                'nombre' => 'Tobias',
                'apellido' => 'Wilson',
                'dni'=> '23434566T',
                'direccion'=> 'Calle Ya levantate 12',
                'telefono'=> '613123464',
                'correo'=> 'tobiasadmin@gmail.com',
                'rol' => 'admin',
                'idOptica'=> 1,
                'activo'=>true,
            ],
            [
                'id' => 6,
                'nombre' => 'Juan',
                'apellido'=> 'Flores',
                'dni'=> '994132127E',
                'direccion'=> 'Calle Teceje 21',
                'telefono'=> '645122567',
                'correo'=> 'jflower21@gmail.com',
                'rol'=> 'optometrista',
                'idOptica'=> 1,
                'activo'=> true,
            ],
            [
                'id' => 7,
                'nombre' => 'Lisa',
                'apellido'=> 'Rivera',
                'dni'=> '20120314Y',
                'direccion'=> 'Calle Realeza 12',
                'telefono'=> '645122567',
                'correo'=> 'lisilis14@gmail.com',
                'rol'=> 'auxiliar',
                'idOptica'=> 1,
                'activo'=> true,
            ],
            [
                'id' => 8,
                'nombre' => 'Emilio',
                'apellido'=> 'Delgado',
                'dni'=> '19760728F',
                'direccion'=> 'Calle Desengaño 21',
                'telefono'=> '915342525',
                'correo'=> 'emilioporfavor@gmail.com',
                'rol'=> 'optometrista',
                'idOptica'=> 2,
                'activo'=> true,
            ],
            [
                'id' => 9,
                'nombre' => 'Juan',
                'apellido'=> 'Cuesta',
                'dni'=> '13299357X',
                'direccion'=> 'Calle Mirador 1',
                'telefono'=> '637450380',
                'correo'=> 'jcpresi@gmail.com',
                'rol'=> 'auxiliar',
                'idOptica'=> 2,
                'activo'=> true,
            ],
            [
                'id' => 10,
                'nombre' => 'Sophia',
                'apellido'=> 'Sanchez',
                'dni'=> '236745422R',
                'direccion'=> 'Calle Plaza Manitas 34',
                'telefono'=> '645122634',
                'correo'=> 'sophii63@gmail.com',
                'rol'=> 'optometrista',
                'idOptica'=> 3,
                'activo'=> true,
            ],

            [

                'id' => 11,
                'nombre' => 'Hernan',
                'apellido'=> 'Mendez',
                'dni'=> '22221989R',
                'direccion'=> 'Calle Estatica 25',
                'telefono'=> '690134235',
                'correo'=> 'herteve12@gmail.com',
                'rol'=> 'auxiliar',
                'idOptica'=> 3,
                'activo'=> true,
            ],
            [
                'id' => 12,
                'nombre' => 'Cristina',
                'apellido'=> 'Martinez',
                'dni'=> '294565321K',
                'direccion'=> 'Calle Cristobal',
                'telefono'=> '647153654',
                'correo'=> 'crizilla@gmail.com',
                'rol'=> 'optometrista',
                'idOptica'=> 1,
                'activo'=> true,
            ],
        ];

        $empleID = [];

        foreach ($users as $user) {
            $user['nombreUsuario']=
                substr($user['nombre'], 0, 4).
                substr($user['apellido'], 0, 4).

                substr($user['dni'], 0, 4);

            $user['contrasenia'] = Hash::make('123456');

            $user['id'] = DB::table('users')->insertGetId($user);
            $empleID[] = $user;
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
                case 'admin':
                    //No hace nada

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
