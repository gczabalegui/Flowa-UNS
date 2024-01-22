<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SecretariaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
               'nombre_secretaria' => 'ceciliapellegrini',
               'legajo' => '7791',
               'nombre' => 'Cecilia Noemi',
               'apellido' => 'Pellegrini',
               'DNI' => '16775272',
               'email' => 'cecilia.pellegrini@uns.edu.ar', 
               'departamento_id' => '1',
            ],
        ];

        DB::table('secretarias')->insert($data);
    }
}
