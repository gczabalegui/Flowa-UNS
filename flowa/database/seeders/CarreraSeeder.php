<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarreraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'codigo_carrera' => 1,
                'nombre_carrera' => 'INGENIERIA AGRONOMICA',
                'plan_version' => 1998,
                'duracion' => 5, // Duración en años
                'cant_materias' => 43,
                'departamento_id' => 1, // Asegúrate de que este ID exista en la tabla departamentos
            ],
            [
                'codigo_carrera' => 2,
                'nombre_carrera' => 'TECNICATURA SUPERIOR AGRARIA EN SUELOS Y AGUAS',
                'plan_version' => 2005,
                'duracion' => 3, // Duración en años
                'cant_materias' => 17,
                'departamento_id' => 1, // Asegúrate de que este ID exista en la tabla departamentos
            ],
            [
                'codigo_carrera' => 3,
                'nombre_carrera' => 'TECNICATURA UNIVERSITARIA APICOLA',
                'plan_version' => 2008,
                'duracion' => 3, // Duración en años
                'cant_materias' => 16,
                'departamento_id' => 1, // Asegúrate de que este ID exista en la tabla departamentos
            ],
            [
                'codigo_carrera' => 4,
                'nombre_carrera' => 'TECNICATURA UNIVERSITARIA EN MANEJO Y COMERCIALIZACION DE GRANOS',
                'plan_version' => 2001,
                'duracion' => 3, // Duración en años
                'cant_materias' => 20,
                'departamento_id' => 1, // Asegúrate de que este ID exista en la tabla departamentos
            ],
            [
                'codigo_carrera' => 5,
                'nombre_carrera' => 'TECNICATURA UNIVERSITARIA EN PARQUES Y JARDINES',
                'plan_version' => 2018,
                'duracion' => 3, // Duración en años
                'cant_materias' => 26,
                'departamento_id' => 1, // Asegúrate de que este ID exista en la tabla departamentos
            ],
        


            // Añade más carreras aquí
        ];

        DB::table('carreras')->insert($data);
    }
}