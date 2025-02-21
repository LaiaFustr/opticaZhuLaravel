<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
            ],
            [
                'id' => 9,
                'nombre' => 'Jordi',
                'apellido' => 'Paillacho',
                'dni'=> '21006147V',
                'direccion'=> 'Calle Totalmente Real 67',
                'telefono'=> '616161616',
                'correo'=> 'jordiadmin@gmail.com',
            ],
            [
                'id' => 10,
                'nombre' => 'Laia',
                'apellido' => 'Fuster',
                'dni'=> '43558634R',
                'direccion'=> 'Calle Existente 12',
                'telefono'=> '634153226',
                'correo'=> 'laiaadmin@gmail.com',
            ],
            [
                'id' => 11,
                'nombre' => 'Oscar',
                'apellido' => 'Mateu',
                'dni'=> '23478457T',
                'direccion'=> 'Calle Enserio que existe 9',
                'telefono'=> '613125327',
                'correo'=> 'oscaradmin@gmail.com',
            ],
            [
                'id' => 12,
                'nombre' => 'Tobias',
                'apellido' => 'Wilson',
                'dni'=> '23434566T',
                'direccion'=> 'Calle Ya levantate 12',
                'telefono'=> '613123464',
                'correo'=> 'tobiasadmin@gmail.com',
            ]
        ];
    }
}
