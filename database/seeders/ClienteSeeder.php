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
              /*   "idAdmin"=> "9", */
            ],
            [
                "nombre"=> "Cassandra",
                "apellido"=> "Sanchez",
                "dni"=> "23474521K",
                "codPostal"=> "46020",
                "telefono"=> "625896431",
               /*  "idAdmin"=> "9", */
            ],
            [
                "nombre"=> "Ricardo",
                "apellido"=> "Paz",
                "dni"=> "24546547R",
                "codPostal"=> "46025",
                "telefono"=> "696342354",
                /* "idAdmin"=> "11", */
            ],
            [
                "nombre"=> "Omar",
                "apellido"=> "Morillo",
                "dni"=> "245276535",
                "codPostal"=> "46018",
                "telefono"=> "698953271",
               /*  "idAdmin"=> "9", */
            ],
            [
                "nombre"=> "Maria",
                "apellido"=> "Martinez",
                "dni"=> "23633111A",
                "codPostal"=> "46016",
                "telefono"=> "625896431",
                /* "idAdmin"=> "12", */
            ],
            [
                "nombre"=> "Alfred",
                "apellido"=> "Sanxez",
                "dni"=> "21832547R",
                "codPostal"=> "49102",
                "telefono"=> "655208923",
               /*  "idAdmin"=> "11", */
            ],
            [
                "nombre"=> "Laura",
                "apellido"=> "Gomez",
                "dni"=> "22112344V",
                "codPostal"=> "46027",
                "telefono"=> "612345678",
                /* "idAdmin"=> "1", */
            ],
            [
                "nombre"=> "Carlos",
                "apellido"=> "Torres",
                "dni"=> "22345678M",
                "codPostal"=> "46030",
                "telefono"=> "693456789",
               /*  "idAdmin"=> "10", */
            ],
            [
                "nombre"=> "Sandra",
                "apellido"=> "Lopez",
                "dni"=> "23898999L",
                "codPostal"=> "46014",
                "telefono"=> "634567890",
               /*  "idAdmin"=> "12", */
            ],
            [
                "nombre"=> "Javier",
                "apellido"=> "Reyes",
                "dni"=> "22789933P",
                "codPostal"=> "46029",
                "telefono"=> "612998877",
               /*  "idAdmin"=> "9", */
            ],
            [
                "nombre"=> "Emilio",
                "apellido"=> "Diaz",
                "dni"=> "23782211G",
                "codPostal"=> "46017",
                "telefono"=> "677334455",
               /*  "idAdmin"=> "10", */
            ],
            [
                "nombre"=> "Pedro",
                "apellido"=> "Martinez",
                "dni"=> "24537891B",
                "codPostal"=> "46032",
                "telefono"=> "690123456",
                /* "idAdmin"=> "9", */
            ],
            [
                "nombre"=> "Ana",
                "apellido"=> "Gonzalez",
                "dni"=> "25648930C",
                "codPostal"=> "46021",
                "telefono"=> "655789123",
                /* "idAdmin"=> "10", */
            ],
            [
                "nombre"=> "Martin",
                "apellido"=> "Paredes",
                "dni"=> "26938574F",
                "codPostal"=> "46019",
                "telefono"=> "633415678",
               /*  "idAdmin"=> "12", */
            ],
            [
                "nombre"=> "Raquel",
                "apellido"=> "Perez",
                "dni"=> "27823984D",
                "codPostal"=> "46033",
                "telefono"=> "622550234",
               /*  "idAdmin"=> "11", */
            ],
        ];

        foreach ($clientes as $cliente){
            DB::table('clientes')->insert([
                'nombre'=> $cliente['nombre'],
                'apellido'=> $cliente['apellido'],
                'dni'=> $cliente['dni'],
                'codPostal'=> $cliente['codPostal'],
                'telefono'=> $cliente['telefono'],
               /*  'idAdmin'=> $cliente['idAdmin'], */
            ]);
        }

    }
}
