<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CalendarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fechaInicio=new \DateTime('2025-02-19');
        $fechaFin=(clone $fechaInicio)->modify('+2 months');

        $festivos=[
            '2025-03-19', // San José
            '2025-04-18', // Viernes Santo
            '2025-04-21', // Lunes de Pascua
            '2025-04-28', // San Vicente Ferrer
        ];

        $datos=[];

            for($fecha=$fechaInicio; $fecha <= $fechaFin; $fecha->modify('+1 day')){
                $formatoFecha= $fecha->format('Y-m-d');
                $datos[]= [
                    'fecha' => $formatoFecha,
                    'festivo' => in_array($formatoFecha, $festivos),
                ];
            }

        $calendarios=DB::table('calendario')->insert($datos);
    }
}
