<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdministracionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nombre_administrativo' => 'guadus',
                'legajo' => '12345',
                'nombre' => 'Guadalu',
                'apellido' => 'Carreño Zabalegui',
                'DNI' => '42000000',
                'email' => 'guadus.c@gmail.com',
                'departamento_id' => '1',

            ]
        ];

        DB::table('administracions')->insert($data);
    }
}
