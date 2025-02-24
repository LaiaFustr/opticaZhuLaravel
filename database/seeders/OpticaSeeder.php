<?php


namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class OpticaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $opticas = [
            [
                'nombre' => 'Óptica Zhu - Centro',
                'telefono' => '934654231',
                'direccion' => 'Calle Verdadera 2',
                'correo' => 'opticazhucentro@opticazhu.com',
                'num_Maquinas' => 2,
                "horaApertura"=> "10:00:00",
                "horaCierre"=> "22:00:00",
                //'idAdmin' => 10,
            ],
            [
                'nombre' => 'Óptica Zhu - Norte',
                'telefono' => '917654678',
                'direccion' => 'Calle Falsa 21',
                'correo' => 'opticazhunorte@opticazhu.com',
                'num_Maquinas' => 3,
                "horaApertura"=> "10:00:00",
                "horaCierre"=> "22:00:00",
                //'idAdmin' => 11,
            ],
            [
                'nombre' => 'Óptica Zhu - Sur',
                'telefono' => '923456959',
                'direccion' => 'Centro Comercial SoyReal, 7',
                'correo' => 'opticazhusur@opticazhu.com',
                'num_Maquinas' => 2,
                "horaApertura"=> "10:00:00",
                "horaCierre"=> "22:00:00",
                //'idAdmin' => 12,
            ],
        ];

        foreach ($opticas as $optica) {
            DB::table('opticas')->insert([
                'nombre' => $optica['nombre'],
                'telefono' => $optica['telefono'],
                'direccion' => $optica['direccion'],
                'correo' => $optica['correo'],
                'num_Maquinas' => $optica['num_Maquinas'],
                'horaApertura' => $optica['horaApertura'],
                'horaCierre' => $optica['horaCierre'],
                //'idAdmin' => $optica['idAdmin'],
            ]);
        }
    }
}
