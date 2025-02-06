<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clientes = [
            [
                "nombre"=> "Martin",
                "apellido"=> "Fernandez",
                "dni"=> "29436267T",
                "codPostal"=> "46031",
                "telefono"=> "678914340",
                "idAdmin"=> "9",
            ],
            [
                "nombre"=> "Cassandra",
                "apellido"=> "Sanchez",
                "dni"=> "23474521K",
                "codPostal"=> "46020",
                "telefono"=> "625896431",
                "idAdmin"=> "9",
            ],
            [
                "nombre"=> "Ricardo",
                "apellido"=> "Paz",
                "dni"=> "24546547R",
                "codPostal"=> "46025",
                "telefono"=> "696342354",
                "idAdmin"=> "11",
            ],
            [
                "nombre"=> "Omar",
                "apellido"=> "Morillo",
                "dni"=> "245276535",
                "codPostal"=> "46018",
                "telefono"=> "698953271",
                "idAdmin"=> "9",
            ],
            [
                "nombre"=> "Maria",
                "apellido"=> "Martinez",
                "dni"=> "23633111A",
                "codPostal"=> "46016",
                "telefono"=> "625896431",
                "idAdmin"=> "12",
            ],
            [
                "nombre"=> "Alfred",
                "apellido"=> "Sanxez",
                "dni"=> "21832547R",
                "codPostal"=> "49102",
                "telefono"=> "655208923",
                "idAdmin"=> "11",
            ]
        ];

        foreach ($clientes as $cliente){
            DB::table('clientes')->insert([
                'nombre'=> $cliente['nombre'],
                'apellido'=> $cliente['apellido'],
                'dni'=> $cliente['dni'],
                'codPostal'=> $cliente['codPostal'],
                'telefono'=> $cliente['telefono'],
                'idAdmin'=> $cliente['idAdmin'],
            ]);
        }

    }
}
