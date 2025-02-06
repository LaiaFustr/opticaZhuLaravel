<?php


namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class HorarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $horarios = [
            [
                "nombre"=> "horarioComun",
                "horaApertura"=> "10:00:00",
                "horaCierre"=> "22:00:00",
                "idAdmin"=> "1",
            ],
            [
                "nombre"=> "horarioFinde",
                "horaApertura"=> "10:00:00",
                "horaCierre"=> "20:00:00",
                "idAdmin"=> "9",
            ],
            [
                "nombre"=> "horarioFestivo",
                "horaApertura"=> "10:00:00",
                "horaCierre"=> "18:00:00",
                "idAdmin"=> "9",
            ],
            [    
                "nombre"=> "horarioFestivo2",
                "horaApertura"=> "00:00:00",
                "horaCierre"=> "00:00:00",
                "idAdmin"=> "9",
            ]
        ];

        foreach ($horarios as $horario) {
            DB::table('horarios')->insert([
                'nombre'=> $horario['nombre'],
                'horaApertura'=> $horario['horaApertura'],
                'horaCierre'=> $horario['horaCierre'],
                'idAdmin'=> $horario['idAdmin']
            ]);
        }

    }
}
