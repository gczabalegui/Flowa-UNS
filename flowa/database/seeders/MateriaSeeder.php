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
                'profesor_id' => '',
                'administracion_id' => '',
            ],

            [
                'nombre_materia' => 'TALLER DE INTRODUCCION A LA REALIDAD AGROPECUARIA:SISTEMAS AGROPECUARIOS',
                'codigo' => '725',
                'profesor_id' => '',
                'administracion_id' => '',
            ],

            [
                'nombre_materia' => 'SISTEMATICA VEGETAL',
                'codigo' => '720',
                'profesor_id' => '',
                'administracion_id' => '',
            ],

            [
                'nombre_materia' => 'TALLER DE INTRODUCCION A LA REALIDAD AGROPECUARIA: TECNOLOGIA Y PRODUCCION AGROPECUARIA',
                'codigo' => '726',
                'profesor_id' => '',
                'administracion_id' => '',
            ],

            [
                'nombre_materia' => 'FUNDAMENTOS DE EDAFOLOGIA',
                'codigo' => '564',
                'profesor_id' => '',
                'administracion_id' => '',
            ],

            [
                'nombre_materia' => 'TALLER DE RECURSOS NATURALES I',
                'codigo' => '729',
                'profesor_id' => '',
                'administracion_id' => '',
            ],

            [
                'nombre_materia' => 'AGROMETEOROLOGIA',
                'codigo' => '505',
                'profesor_id' => '',
                'administracion_id' => '',
            ],

            [
                'nombre_materia' => 'FISIOLOGIA VEGETAL I-A',
                'codigo' => '563',
                'profesor_id' => '',
                'administracion_id' => '',
            ],

            [
                'nombre_materia' => 'GENETICA BASICA Y APLICADA',
                'codigo' => '578',
                'profesor_id' => '',
                'administracion_id' => '',
            ],

            [
                'nombre_materia' => 'PROPIEDADES EDAFICAS Y FERTILIDAD',
                'codigo' => '702',
                'profesor_id' => '',
                'administracion_id' => '',
            ],

            [
                'nombre_materia' => 'TALLER DE RECURSOS NATURALES II',
                'codigo' => '733',
                'profesor_id' => '',
                'administracion_id' => '',
            ],

            [
                'nombre_materia' => 'TALLER DE PRODUCCION ANIMAL',
                'codigo' => '727',
                'profesor_id' => '',
                'administracion_id' => '',
            ],

            [
                'nombre_materia' => 'ECOLOGIA',
                'codigo' => '535',
                'profesor_id' => '',
                'administracion_id' => '',
            ],

            [
                'nombre_materia' => 'FISIOLOGIA Y NUTRICION ANIMAL',
                'codigo' => '552',
                'profesor_id' => '',
                'administracion_id' => '',
            ],

            [
                'nombre_materia' => 'MECANICA Y MAQUINARIA AGRICOLA',
                'codigo' => '621',
                'profesor_id' => '',
                'administracion_id' => '',
            ],

            [
                'nombre_materia' => 'MICROBIOLOGIA AGRICOLA',
                'codigo' => '608',
                'profesor_id' => '',
                'administracion_id' => '',
            ],

            [
                'nombre_materia' => 'ANIMALES MONOGASTRICOS',
                'codigo' => '502',
                'profesor_id' => '',
                'administracion_id' => '',
            ],

            [
                'nombre_materia' => 'FUNDAMENTOS DE PROTECCION VEGETAL Y MANEJO DE MALEZAS',
                'codigo' => '565',
                'profesor_id' => '',
                'administracion_id' => '',
            ],

            [
                'nombre_materia' => 'PRODUCCION BOVINA Y OVINA',
                'codigo' => '688',
                'profesor_id' => '',
                'administracion_id' => '',
            ],

            [
                'nombre_materia' => 'PRODUCCION Y UTILIZACION DE PASTURAS',
                'codigo' => '703',
                'profesor_id' => '',
                'administracion_id' => '',
            ],

            [
                'nombre_materia' => 'TALLER DE PRODUCCION VEGETAL',
                'codigo' => '728',
                'profesor_id' => '',
                'administracion_id' => '',
            ],

            [
                'nombre_materia' => 'CULTIVOS INTENSIVOS',
                'codigo' => '547',
                'profesor_id' => '',
                'administracion_id' => '',
            ],

            [
                'nombre_materia' => 'ECONOMIA DE LA EMPRESA AGROPECUARIA',
                'codigo' => '548',
                'profesor_id' => '',
                'administracion_id' => '',
            ],

            [
                'nombre_materia' => 'EVALUACION Y MANEJO DE SUELOS',
                'codigo' => '549',
                'profesor_id' => '',
                'administracion_id' => '',
            ],

            [
                'nombre_materia' => 'ZOOLOGIA AGRICOLA',
                'codigo' => '811',
                'profesor_id' => '',
                'administracion_id' => '',
            ],

            [
                'nombre_materia' => 'FUNDAMENTOS DE FITOPATOLOGIA',
                'codigo' => '614',
                'profesor_id' => '',
                'administracion_id' => '',
            ],

            [
                'nombre_materia' => 'GESTION Y EXTENSION AGROPECUARIA',
                'codigo' => '574',
                'profesor_id' => '',
                'administracion_id' => '',
            ],

            [
                'nombre_materia' => 'HIDROLOGIA Y RIEGO',
                'codigo' => '579',
                'profesor_id' => '',
                'administracion_id' => '',
            ],

            [
                'nombre_materia' => 'PRODUCCION VEGETAL EXTENSIVA',
                'codigo' => '687',
                'profesor_id' => '',
                'administracion_id' => '',
            ],

        ];

        DB::table('materias')->insert($data);
    }
}
