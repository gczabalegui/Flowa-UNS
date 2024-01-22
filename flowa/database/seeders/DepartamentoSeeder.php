<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'codigo_departamento' => '1',
                'nombre_departamento' => 'Departamento de Agronomia',
                'direccion' => 'San Andres 612, Bahía Blanca, Provincia de Buenos Aires',
                'sitio_web' => 'https://www.uns.edu.ar/deptos/agronomia',
                'secretaria_id' => '1',
            ],
        ];

        DB::table('departamentos')->insert($data);
    }
}
