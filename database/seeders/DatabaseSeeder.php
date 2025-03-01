<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

            //HorarioSeeder::class,
        $this->call([
            OpticaSeeder::class,
            UserSeeder::class,
            AdminSeeder::class,
            HorarioSeeder::class,
            //EmpleadoSeeder::class,
            ClienteSeeder::class,
            FestivosSeeder::class,
            CitaSeeder::class,
            AsignarOpticaSeeder::class,

        ]);
    }
}
