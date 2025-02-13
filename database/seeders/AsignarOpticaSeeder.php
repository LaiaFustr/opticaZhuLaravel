<?php


namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AsignarOpticaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $asignar = [
        [
            "idEmpleado"=> 2,
            "idOptica"=> 1,
            "fecha"=> "2025-02-10",
        ],
        [
            "idEmpleado"=> 4,
            "idOptica"=> 2,
            "fecha"=> "2025-02-20",
        ],
        [
            "idEmpleado"=> 3,
            "idOptica"=> 2,
            "fecha"=> "2025-02-16",
        ],
        [
            "idEmpleado"=> 1,
            "idOptica"=> 1,
            "fecha"=> "2025-02-10",
        ],
        [
            "idEmpleado"=> 5,
            "idOptica"=> 1,
            "fecha"=> "2025-03-05",
        ]
        ];

        foreach($asignar as $asigna){
            DB::table('asignaropticas')->insert([
                'idEmpleado'=> $asigna['idEmpleado'],
                'idOptica'=> $asigna['idOptica'],
                'fecha'=> $asigna['fecha'],
            ]);
        }
    }
}