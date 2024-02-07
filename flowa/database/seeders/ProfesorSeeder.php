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
               'nombre_profesor' => 'danielpelaez',
               'legajo' => '5159',
               'nombre' => 'Daniel Valerio',
               'apellido' => 'Pelaez',
               'DNI' => '10976193',
               'email' => 'daniel.pelaez@uns.edu.ar', 
            ],
        ];

        DB::table('profesors')->insert($data);
    }
}
