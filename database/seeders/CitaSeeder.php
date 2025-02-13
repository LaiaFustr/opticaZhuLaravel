<?php


namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CitaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $citas=[
            [
                'fecha' => '2025-03-06',
                'hora'=> '12:00:00',
                'descripcion'=> 'Primera revision de ojos',
                'idOptometrista'=> '1',
                'idCliente'=> '2',
                'idAdmin'=> '9',
                'idOptica'=> '1',
            ],
            [
                'fecha' => '2025-03-06',
                'hora'=> '16:30:00',
                'descripcion'=> 'Recogida de gafas',
                'idOptometrista'=> '3',
                'idCliente'=> '6',
                'idAdmin'=> '11',
                'idOptica'=> '2',
            ],
            [
                'fecha' => '2025-03-06',
                'hora'=> '18:00:00',
                'descripcion'=> 'Primera prueba de lentillas',
                'idOptometrista'=> '2',
                'idCliente'=> '6',
                'idAdmin'=> '11',
                'idOptica'=> '2',
            ],
            [
                'fecha' => '2025-03-07',
                'hora'=> '11:00:00',
                'descripcion'=> 'Primera revision de ojos',
                'idOptometrista'=> '2',
                'idCliente'=> '1',
                'idAdmin'=> '10',
                'idOptica'=> '3',
            ],
            [
                'fecha' => '2025-03-07',
                'hora'=> '12:00:00',
                'descripcion'=> 'Primera revision de ojos',
                'idOptometrista'=> '1',
                'idCliente'=> '5',
                'idAdmin'=> '10',
                'idOptica'=> '3',
            ],
            [
                'fecha' => '2025-03-07',
                'hora'=> '13:00:00',
                'descripcion'=> 'Primera revision de ojos',
                'idOptometrista'=> '2',
                'idCliente'=> '3',
                'idAdmin'=> '12',
                'idOptica'=> '2',
            ],
            [
                'fecha' => '2025-03-07',
                'hora'=> '16:00:00',
                'descripcion'=> 'Segunda revision de ojos por problemas en la maquina ',
                'idOptometrista'=> '3',
                'idCliente'=> '2',
                'idAdmin'=> '11',
                'idOptica'=> '1',
            ],
            [
                'fecha' => '2025-03-07',
                'hora'=> '17:00:00',
                'descripcion'=> 'Primera revision de ojos',
                'idOptometrista'=> '1',
                'idCliente'=> '4',
                'idAdmin'=> '9',
                'idOptica'=> '3',
            ]
        ];

        foreach($citas as $cita){
        DB::table('citas')->insert([
            'fecha'=> $cita['fecha'],
            'hora'=> $cita['hora'],
            'descripcion'=> $cita['descripcion'],
            'idOptometrista'=> $cita['idOptometrista'],
            'idCliente'=> $cita['idCliente'],
            'idAdmin'=> $cita['idAdmin'],
            'idOptica'=>$cita['idOptica'],    
        ]);
        }
    }
}