<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfesorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nombre_profesor' => 'Daniel',
                'apellido_profesor' => 'Pelaez',
                'DNI_profesor' => '10976193',
                'email_profesor' => 'daniel.pelaez@uns.edu.ar',
                'legajo_profesor' => '9',
             ],
             [
                'nombre_profesor' => 'Maria',
                'apellido_profesor' => 'Garcia',
                'DNI_profesor' => '20976194',
                'email_profesor' => 'maria.garcia@uns.edu.ar',
                'legajo_profesor' => '5160',
             ],
             [
                'nombre_profesor' => 'Juan',
                'apellido_profesor' => 'Perez',
                'DNI_profesor' => '30976195',
                'email_profesor' => 'juan.perez@uns.edu.ar',
                'legajo_profesor' => '5161',
             ],
        ];

        DB::table('profesors')->insert($data);
    }
}
