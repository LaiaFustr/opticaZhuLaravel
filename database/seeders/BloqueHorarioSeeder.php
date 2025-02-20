<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Calendario;
use App\Models\Optica;
use Illuminate\Support\Facades\DB;


class BloqueHorarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $optica= Optica::first();

        //dd($optica);

            $horaInicio = new \DateTime('09:00');
            $horaFin = new \DateTime('20:00');
            $bloques = [];

            // Generar bloques de 30 minutos por cada calendario
            while ($horaInicio < $horaFin) {
                $horaFinal = clone $horaInicio;
                $horaFinal->modify('+30 minutes');

                $bloques[] = [
                    'hora_inicio' => $horaInicio->format('H:i'),
                    'hora_fin' => $horaFinal->format('H:i'),
                    'citasPosibles'=> $optica ? $optica->num_Maquinas: 0,
                    'idOptica'=>1,
                ];

                $horaInicio->modify('+30 minutes');
            }

            // Insertar bloques de horario en la base de datos
            DB::table('bloque_horario')->insert($bloques);
        }
    }

