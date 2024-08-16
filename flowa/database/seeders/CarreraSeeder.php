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
                'codigo_carrera' => 101,
                'nombre_carrera' => 'Ingeniería en Sistemas',
                'plan_version' => 2021,
                'duracion' => 5, // Duración en años
                'cant_materias' => 40,
                'departamento_id' => 1, // Asegúrate de que este ID exista en la tabla departamentos
            ],
            [
                'codigo_carrera' => 102,
                'nombre_carrera' => 'Ingeniería Industrial',
                'plan_version' => 2021,
                'duracion' => 5, // Duración en años
                'cant_materias' => 38,
                'departamento_id' => 2, // Asegúrate de que este ID exista en la tabla departamentos
            ],
            [
                'codigo_carrera' => 103,
                'nombre_carrera' => 'Ingeniería Civil',
                'plan_version' => 2021,
                'duracion' => 5, // Duración en años
                'cant_materias' => 42,
                'departamento_id' => 1, // Asegúrate de que este ID exista en la tabla departamentos
            ],
            // Añade más carreras aquí
        ];

        DB::table('carreras')->insert($data);
    }
}