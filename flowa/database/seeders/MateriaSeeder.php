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
                'codigo_materia' => '640',
                'horas_semanales' => '4',
                'horas_totales' => '64',
               'profesor_id' => '1',
                'carrera_id' => '2',
                //'administracion_id' => '',
            ],

            [
                'nombre_materia' => 'TALLER DE INTRODUCCION A LA REALIDAD AGROPECUARIA:SISTEMAS AGROPECUARIOS',
                'codigo_materia' => '725',
                'horas_semanales' => '4',
                'horas_totales' => '64',
               'profesor_id' => '2',
                'carrera_id' => '1',
                //'administracion_id' => '',
            ],

            [
                'nombre_materia' => 'SISTEMATICA VEGETAL',
                'codigo_materia' => '720',
                'horas_semanales' => '4',
                'horas_totales' => '64',
               'profesor_id' => '1',
                'carrera_id' => '1',
                //'administracion_id' => '',
            ],

            [
                'nombre_materia' => 'TALLER DE INTRODUCCION A LA REALIDAD AGROPECUARIA: TECNOLOGIA Y PRODUCCION AGROPECUARIA',
                'codigo_materia' => '726',
                'horas_semanales' => '4',
                'horas_totales' => '64',
               'profesor_id' => '3',
                'carrera_id' => '1',
                //'administracion_id' => '',
            ],

            [
                'nombre_materia' => 'FUNDAMENTOS DE EDAFOLOGIA',
                'codigo_materia' => '564',
                'horas_semanales' => '4',
                'horas_totales' => '64',
               'profesor_id' => '3',
                'carrera_id' => '1',
                //'administracion_id' => '',
            ],

            [
                'nombre_materia' => 'TALLER DE RECURSOS NATURALES I',
                'codigo_materia' => '729',
                'horas_semanales' => '4',
                'horas_totales' => '64',
               'profesor_id' => '2',
                'carrera_id' => '2',
               // 'administracion_id' => '',
            ],

            [
                'nombre_materia' => 'AGROMETEOROLOGIA',
                'codigo_materia' => '505',
                'horas_semanales' => '4',
                'horas_totales' => '64',
               'profesor_id' => '2',
                'carrera_id' => '2',
                //'administracion_id' => '',
            ],

            [
                'nombre_materia' => 'FISIOLOGIA VEGETAL I-A',
                'codigo_materia' => '563',
                'horas_semanales' => '4',
                'horas_totales' => '64',
               'profesor_id' => '1',
                'carrera_id' => '2',
                //'administracion_id' => '',
            ],

            [
                'nombre_materia' => 'GENETICA BASICA Y APLICADA',
                'codigo_materia_materia' => '578',
                'horas_semanales' => '4',
                'horas_totales' => '64',
               'profesor_id' => '1',
                'carrera_id' => '2',
                //'administracion_id' => '',
            ],

            [
                'nombre_materia' => 'PROPIEDADES EDAFICAS Y FERTILIDAD',
                'codigo_materia' => '702',
                'horas_semanales' => '4',
                'horas_totales' => '64',
               'profesor_id' => '2',
                'carrera_id' => '2',
                //'administracion_id' => '',
            ],

            [
                'nombre_materia' => 'TALLER DE RECURSOS NATURALES II',
                'codigo_materia' => '733',
                'horas_semanales' => '4',
                'horas_totales' => '64',
               'profesor_id' => '3',
                'carrera_id' => '2',
                //'administracion_id' => '',
            ],

            [
                'nombre_materia' => 'TALLER DE PRODUCCION ANIMAL',
                'codigo_materia' => '727',
                'horas_semanales' => '4',
                'horas_totales' => '64',
               'profesor_id' => '2',
                'carrera_id' => '2',
                //'administracion_id' => '',
            ],

            [
                'nombre_materia' => 'ECOLOGIA',
                'codigo_materia' => '535',
                'horas_semanales' => '4',
                'horas_totales' => '64',
               'profesor_id' => '1',
                'carrera_id' => '2',
                //'administracion_id' => '',
            ],

            [
                'nombre_materia' => 'FISIOLOGIA Y NUTRICION ANIMAL',
                'codigo_materia' => '552',
                'horas_semanales' => '4',
                'horas_totales' => '64',
               'profesor_id' => '3',
                'carrera_id' => '2',
                //'administracion_id' => '',
            ],

            [
                'nombre_materia' => 'MECANICA Y MAQUINARIA AGRICOLA',
                'codigo_materia' => '621',
                'horas_semanales' => '4',
                'horas_totales' => '64',
               'profesor_id' => '2',
                'carrera_id' => '2',
                //'administracion_id' => '',
            ],

            [
                'nombre_materia' => 'MICROBIOLOGIA AGRICOLA',
                'codigo_materia' => '608',
                'horas_semanales' => '4',
                'horas_totales' => '64',
               'profesor_id' => '1',
                'carrera_id' => '2',
               // 'administracion_id' => '',
            ],

            [
                'nombre_materia' => 'ANIMALES MONOGASTRICOS',
                'codigo_materia' => '502',
                'horas_semanales' => '4',
                'horas_totales' => '64',
               'profesor_id' => '2',
                'carrera_id' => '2',
                //'administracion_id' => '',
            ],

            [
                'nombre_materia' => 'FUNDAMENTOS DE PROTECCION VEGETAL Y MANEJO DE MALEZAS',
                'codigo_materia' => '565',
                'horas_semanales' => '4',
                'horas_totales' => '64',
               'profesor_id' => '3',
                'carrera_id' => '2',
                //'administracion_id' => '',
            ],

            [
                'nombre_materia' => 'PRODUCCION BOVINA Y OVINA',
                'codigo_materia' => '688',
                'horas_semanales' => '4',
                'horas_totales' => '64',
               'profesor_id' => '1',
                'carrera_id' => '2',
                //'administracion_id' => '',
            ],

            [
                'nombre_materia' => 'PRODUCCION Y UTILIZACION DE PASTURAS',
                'codigo_materia' => '703',
                'horas_semanales' => '4',
                'horas_totales' => '64',
               'profesor_id' => '1',
                'carrera_id' => '2',
                //'administracion_id' => '',
            ],

            [
                'nombre_materia' => 'TALLER DE PRODUCCION VEGETAL',
                'codigo_materia' => '728',
                'horas_semanales' => '4',
                'horas_totales' => '64',
               'profesor_id' => '1',
                'carrera_id' => '2',
                //'administracion_id' => '',
            ],

            [
                'nombre_materia' => 'CULTIVOS INTENSIVOS',
                'codigo_materia' => '547',
                'horas_semanales' => '4',
                'horas_totales' => '64',
               'profesor_id' => '1',
                'carrera_id' => '2',
                //'administracion_id' => '',
            ],

            [
                'nombre_materia' => 'ECONOMIA DE LA EMPRESA AGROPECUARIA',
                'codigo_materia' => '548',
                'horas_semanales' => '4',
                'horas_totales' => '64',
               'profesor_id' => '1',
                'carrera_id' => '2',
                //'administracion_id' => '',
            ],

            [
                'nombre_materia' => 'EVALUACION Y MANEJO DE SUELOS',
                'codigo_materia' => '549',
                'horas_semanales' => '4',
                'horas_totales' => '64',
               'profesor_id' => '1',
                'carrera_id' => '2',
                //'administracion_id' => '',
            ],

            [
                'nombre_materia' => 'ZOOLOGIA AGRICOLA',
                'codigo_materia' => '811',
                'horas_semanales' => '4',
                'horas_totales' => '64',
               'profesor_id' => '2',
                'carrera_id' => '2',
                //'administracion_id' => '',
            ],

            [
                'nombre_materia' => 'FUNDAMENTOS DE FITOPATOLOGIA',
                'codigo_materia' => '614',
                'horas_semanales' => '4',
                'horas_totales' => '64',
               'profesor_id' => '3',
                'carrera_id' => '2',
                //'administracion_id' => '',
            ],

            [
                'nombre_materia' => 'GESTION Y EXTENSION AGROPECUARIA',
                'codigo_materia' => '574',
                'horas_semanales' => '4',
                'horas_totales' => '64',
               'profesor_id' => '3',
                'carrera_id' => '2',
                //'administracion_id' => '',
            ],

            [
                'nombre_materia' => 'HIDROLOGIA Y RIEGO',
                'codigo_materia' => '579',
                'horas_semanales' => '4',
                'horas_totales' => '64',
               'profesor_id' => '3',
                'carrera_id' => '2',
                //'administracion_id' => '',
            ],

            [
                'nombre_materia' => 'PRODUCCION VEGETAL EXTENSIVA',
                'codigo_materia' => '687',
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
