<?php

namespace Database\Seeders;

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
                'calle_departamento' => 'San Andres',
                'numero_departamento' => '612',
                'sitio_web_departamento' => 'https://www.uns.edu.ar/deptos/agronomia',
                ////'secretaria_id' => '1'
            ],
            [
                'codigo_departamento' => '2',
                'nombre_departamento' => 'DCIC',
                'calle_departamento' => 'San Andres',
                'numero_departamento' => '8000',
                'sitio_web_departamento' => 'https://cs.uns.edu.ar/~devcs/',
                //'secretaria_id' => '1'
            ],
        ];

        DB::table('departamentos')->insert($data);
    }
}
