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
                'nombre_secretaria' => 'Cecilia Noemi',
               'apellido_secretaria' => 'Pellegrini',
               'DNI_secretaria' => '16775272',
               'legajo_secretaria' => '7791',
               'email_secretaria' => 'cecilia.pellegrini@uns.edu.ar', 
               'departamento_id' => '1',
            ],
        ];

        DB::table('secretarias')->insert($data);
    }
}
