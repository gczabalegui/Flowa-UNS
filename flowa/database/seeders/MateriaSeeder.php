<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MateriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nombre_materia' => 'MORFOLOGIA VEGETAL',
                'codigo' => '640',
                'horas_semanales' => '4',
                'horas_totales' => '64',
               'profesor_id' => '1',
                'carrera_id' => '2',
                //'administracion_id' => '',
            ],

            [
                'nombre_materia' => 'TALLER DE INTRODUCCION A LA REALIDAD AGROPECUARIA:SISTEMAS AGROPECUARIOS',
                'codigo' => '725',
                'horas_semanales' => '4',
                'horas_totales' => '64',
               'profesor_id' => '1',
                'carrera_id' => '1',
                //'administracion_id' => '',
            ],

            [
                'nombre_materia' => 'SISTEMATICA VEGETAL',
                'codigo' => '720',
                'horas_semanales' => '4',
                'horas_totales' => '64',
               'profesor_id' => '1',
                'carrera_id' => '1',
                //'administracion_id' => '',
            ],

            [
                'nombre_materia' => 'TALLER DE INTRODUCCION A LA REALIDAD AGROPECUARIA: TECNOLOGIA Y PRODUCCION AGROPECUARIA',
                'codigo' => '726',
                'horas_semanales' => '4',
                'horas_totales' => '64',
               'profesor_id' => '2',
                'carrera_id' => '1',
                //'administracion_id' => '',
            ],

            [
                'nombre_materia' => 'FUNDAMENTOS DE EDAFOLOGIA',
                'codigo' => '564',
                'horas_semanales' => '4',
                'horas_totales' => '64',
               'profesor_id' => '3',
                'carrera_id' => '1',
                //'administracion_id' => '',
            ],

            [
                'nombre_materia' => 'TALLER DE RECURSOS NATURALES I',
                'codigo' => '729',
                'horas_semanales' => '4',
                'horas_totales' => '64',
               'profesor_id' => '1',
                'carrera_id' => '2',
               // 'administracion_id' => '',
            ],

            [
                'nombre_materia' => 'AGROMETEOROLOGIA',
                'codigo' => '505',
                'horas_semanales' => '4',
                'horas_totales' => '64',
               'profesor_id' => '2',
                'carrera_id' => '2',
                //'administracion_id' => '',
            ],

            [
                'nombre_materia' => 'FISIOLOGIA VEGETAL I-A',
                'codigo' => '563',
                'horas_semanales' => '4',
                'horas_totales' => '64',
               'profesor_id' => '1',
                'carrera_id' => '2',
                //'administracion_id' => '',
            ],

            [
                'nombre_materia' => 'GENETICA BASICA Y APLICADA',
                'codigo' => '578',
                'horas_semanales' => '4',
                'horas_totales' => '64',
               'profesor_id' => '1',
                'carrera_id' => '2',
                //'administracion_id' => '',
            ],

            [
                'nombre_materia' => 'PROPIEDADES EDAFICAS Y FERTILIDAD',
                'codigo' => '702',
                'horas_semanales' => '4',
                'horas_totales' => '64',
               'profesor_id' => '2',
                'carrera_id' => '2',
                //'administracion_id' => '',
            ],

            [
                'nombre_materia' => 'TALLER DE RECURSOS NATURALES II',
                'codigo' => '733',
                'horas_semanales' => '4',
                'horas_totales' => '64',
               'profesor_id' => '3',
                'carrera_id' => '2',
                //'administracion_id' => '',
            ],

            [
                'nombre_materia' => 'TALLER DE PRODUCCION ANIMAL',
                'codigo' => '727',
                'horas_semanales' => '4',
                'horas_totales' => '64',
               'profesor_id' => '2',
                'carrera_id' => '2',
                //'administracion_id' => '',
            ],

            [
                'nombre_materia' => 'ECOLOGIA',
                'codigo' => '535',
                'horas_semanales' => '4',
                'horas_totales' => '64',
               'profesor_id' => '1',
                'carrera_id' => '2',
                //'administracion_id' => '',
            ],

            [
                'nombre_materia' => 'FISIOLOGIA Y NUTRICION ANIMAL',
                'codigo' => '552',
                'horas_semanales' => '4',
                'horas_totales' => '64',
               'profesor_id' => '3',
                'carrera_id' => '2',
                //'administracion_id' => '',
            ],

            [
                'nombre_materia' => 'MECANICA Y MAQUINARIA AGRICOLA',
                'codigo' => '621',
                'horas_semanales' => '4',
                'horas_totales' => '64',
               'profesor_id' => '2',
                'carrera_id' => '2',
                //'administracion_id' => '',
            ],

            [
                'nombre_materia' => 'MICROBIOLOGIA AGRICOLA',
                'codigo' => '608',
                'horas_semanales' => '4',
                'horas_totales' => '64',
               'profesor_id' => '1',
                'carrera_id' => '2',
               // 'administracion_id' => '',
            ],

            [
                'nombre_materia' => 'ANIMALES MONOGASTRICOS',
                'codigo' => '502',
                'horas_semanales' => '4',
                'horas_totales' => '64',
               'profesor_id' => '2',
                'carrera_id' => '2',
                //'administracion_id' => '',
            ],

            [
                'nombre_materia' => 'FUNDAMENTOS DE PROTECCION VEGETAL Y MANEJO DE MALEZAS',
                'codigo' => '565',
                'horas_semanales' => '4',
                'horas_totales' => '64',
               'profesor_id' => '3',
                'carrera_id' => '2',
                //'administracion_id' => '',
            ],

            [
                'nombre_materia' => 'PRODUCCION BOVINA Y OVINA',
                'codigo' => '688',
                'horas_semanales' => '4',
                'horas_totales' => '64',
               'profesor_id' => '1',
                'carrera_id' => '2',
                //'administracion_id' => '',
            ],

            [
                'nombre_materia' => 'PRODUCCION Y UTILIZACION DE PASTURAS',
                'codigo' => '703',
                'horas_semanales' => '4',
                'horas_totales' => '64',
               'profesor_id' => '1',
                'carrera_id' => '2',
                //'administracion_id' => '',
            ],

            [
                'nombre_materia' => 'TALLER DE PRODUCCION VEGETAL',
                'codigo' => '728',
                'horas_semanales' => '4',
                'horas_totales' => '64',
               'profesor_id' => '1',
                'carrera_id' => '2',
                //'administracion_id' => '',
            ],

            [
                'nombre_materia' => 'CULTIVOS INTENSIVOS',
                'codigo' => '547',
                'horas_semanales' => '4',
                'horas_totales' => '64',
               'profesor_id' => '1',
                'carrera_id' => '2',
                //'administracion_id' => '',
            ],

            [
                'nombre_materia' => 'ECONOMIA DE LA EMPRESA AGROPECUARIA',
                'codigo' => '548',
                'horas_semanales' => '4',
                'horas_totales' => '64',
               'profesor_id' => '1',
                'carrera_id' => '2',
                //'administracion_id' => '',
            ],

            [
                'nombre_materia' => 'EVALUACION Y MANEJO DE SUELOS',
                'codigo' => '549',
                'horas_semanales' => '4',
                'horas_totales' => '64',
               'profesor_id' => '1',
                'carrera_id' => '2',
                //'administracion_id' => '',
            ],

            [
                'nombre_materia' => 'ZOOLOGIA AGRICOLA',
                'codigo' => '811',
                'horas_semanales' => '4',
                'horas_totales' => '64',
               'profesor_id' => '2',
                'carrera_id' => '2',
                //'administracion_id' => '',
            ],

            [
                'nombre_materia' => 'FUNDAMENTOS DE FITOPATOLOGIA',
                'codigo' => '614',
                'horas_semanales' => '4',
                'horas_totales' => '64',
               'profesor_id' => '3',
                'carrera_id' => '2',
                //'administracion_id' => '',
            ],

            [
                'nombre_materia' => 'GESTION Y EXTENSION AGROPECUARIA',
                'codigo' => '574',
                'horas_semanales' => '4',
                'horas_totales' => '64',
               'profesor_id' => '3',
                'carrera_id' => '2',
                //'administracion_id' => '',
            ],

            [
                'nombre_materia' => 'HIDROLOGIA Y RIEGO',
                'codigo' => '579',
                'horas_semanales' => '4',
                'horas_totales' => '64',
               'profesor_id' => '3',
                'carrera_id' => '2',
                //'administracion_id' => '',
            ],

            [
                'nombre_materia' => 'PRODUCCION VEGETAL EXTENSIVA',
                'codigo' => '687',
                'horas_semanales' => '4',
                'horas_totales' => '64',
               'profesor_id' => '2',
                'carrera_id' => '2',
                //'administracion_id' => '',
            ],

        ];

        DB::table('materias')->insert($data);
    }
}
