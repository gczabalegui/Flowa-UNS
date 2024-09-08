<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Plan;

class PlanSeeder extends Seeder
{
    public function run()
    {
        // Plan creado por Administración
        Plan::create([
            'materia_id' => 1, // Asegúrate de tener una materia con este ID o ajusta según tu base de datos
            'anio' => 2024,
            'horas_totales' => 120,
            'horas_teoricas' => 80,
            'horas_practicas' => 40,
            'DTE' => 11,
            'RTF' => 12,
            'creditos_academicos' => 10,
            'estado' => 'Completo por administración.',
            'area_tematica' => Plan::AREA_TEMATICA[1], // 'Formación aplicada'
            'fundamentacion' => 'Esta es la fundamentación creada por el profesor.',
            'obj_conceptuales' => 'Conceptuales - Profesor',
            'obj_procedimentales' => 'Procedimentales - Profesor',
            'obj_actitudinales' => 'Actitudinales - Profesor',
            'obj_especificos' => 'Objetivos específicos - Profesor',
            'cont_minimos' => 'Contenidos mínimos establecidos por el profesor.',
            'programa_analitico' => 'Programa analítico completo - Profesor',
            'act_practicas' => 'Actividades prácticas creadas por el profesor.',
            'modalidad' => 'Virtual',
            'bibliografia' => 'Bibliografía recomendada por el profesor.',
        ]);

        // Plan creado por Profesor
        Plan::create([
            'materia_id' => 2, // Asegúrate de tener una materia con este ID o ajusta según tu base de datos
            'anio' => 2024,
            'horas_totales' => 90,
            'horas_teoricas' => 50,
            'horas_practicas' => 40,
            'DTE' => 18,
            'RTF' => 22,
            'creditos_academicos' => 8,
            'estado' => 'Completo por administración.',
            'area_tematica' => Plan::AREA_TEMATICA[1], // 'Formación aplicada'
            'fundamentacion' => 'Esta es la fundamentación creada por el profesor.',
            'obj_conceptuales' => 'Conceptuales - Profesor',
            'obj_procedimentales' => 'Procedimentales - Profesor',
            'obj_actitudinales' => 'Actitudinales - Profesor',
            'obj_especificos' => 'Objetivos específicos - Profesor',
            'cont_minimos' => 'Contenidos mínimos establecidos por el profesor.',
            'programa_analitico' => 'Programa analítico completo - Profesor',
            'act_practicas' => 'Actividades prácticas creadas por el profesor.',
            'modalidad' => 'Virtual',
            'bibliografia' => 'Bibliografía recomendada por el profesor.'
        ]);

        Plan::create([
            'materia_id' => 3, // Asegúrate de tener una materia con este ID o ajusta según tu base de datos
            'anio' => 2025,
            'horas_totales' => 140,
            'horas_teoricas' => 90,
            'horas_practicas' => 50,
            'DTE' => 13,
            'RTF' => 14,
            'creditos_academicos' => 12,
            'estado' => 'Completo por administración.',
            'area_tematica' => Plan::AREA_TEMATICA[2], // 'Investigación aplicada'
            'fundamentacion' => 'Esta es la fundamentación alternativa creada por otro profesor.',
            'obj_conceptuales' => 'Conceptuales - Otro Profesor',
            'obj_procedimentales' => 'Procedimentales - Otro Profesor',
            'obj_actitudinales' => 'Actitudinales - Otro Profesor',
            'obj_especificos' => 'Objetivos específicos - Otro Profesor',
            'cont_minimos' => 'Contenidos mínimos actualizados por otro profesor.',
            'programa_analitico' => 'Programa analítico extendido - Otro Profesor',
            'act_practicas' => 'Nuevas actividades prácticas desarrolladas.',
            'modalidad' => 'Presencial',
            'bibliografia' => 'Bibliografía adicional recomendada.',
        ]);

        Plan::create([
            'materia_id' => 4, // Ajusta según tu base de datos
            'anio' => 2023,
            'horas_totales' => 100,
            'horas_teoricas' => 60,
            'horas_practicas' => 40,
            'DTE' => 9,
            'RTF' => 10,
            'creditos_academicos' => 8,
            'estado' => 'Completo por administración.',
            'area_tematica' => Plan::AREA_TEMATICA[0], // 'Formación general'
            'fundamentacion' => 'Fundamentación ajustada por el profesor para el plan 2023.',
            'obj_conceptuales' => 'Nuevos objetivos conceptuales establecidos por el profesor.',
            'obj_procedimentales' => 'Procedimentales actualizados.',
            'obj_actitudinales' => 'Objetivos actitudinales revisados.',
            'obj_especificos' => 'Específicos establecidos para el curso de este año.',
            'cont_minimos' => 'Contenidos mínimos según las nuevas directrices.',
            'programa_analitico' => 'Programa analítico con cambios en los temas principales.',
            'act_practicas' => 'Nuevas actividades prácticas aplicadas en las clases.',
            'modalidad' => 'Mixta',
            'bibliografia' => 'Bibliografía renovada para el curso 2023.',
        ]);

        Plan::create([
            'materia_id' => 5, // Asegúrate de tener una materia con este ID o ajusta según tu base de datos
            'anio' => 2024,
            'horas_totales' => 120,
            'horas_teoricas' => 80,
            'horas_practicas' => 40,
            'DTE' => 11,
            'RTF' => 12,
            'creditos_academicos' => 10,
            'estado' => 'Completo por administración.',
            'area_tematica' => Plan::AREA_TEMATICA[1], // 'Formación aplicada'
            'fundamentacion' => 'Esta es la fundamentación creada por el profesor.',
            'obj_conceptuales' => 'Conceptuales - Profesor',
            'obj_procedimentales' => 'Procedimentales - Profesor',
            'obj_actitudinales' => 'Actitudinales - Profesor',
            'obj_especificos' => 'Objetivos específicos - Profesor',
            'cont_minimos' => 'Contenidos mínimos establecidos por el profesor.',
            'programa_analitico' => 'Programa analítico completo - Profesor',
            'act_practicas' => 'Actividades prácticas creadas por el profesor.',
            'modalidad' => 'Virtual',
            'bibliografia' => 'Bibliografía recomendada por el profesor.',
        ]);

        Plan::create([
            'materia_id' => 6, // Asegúrate de tener una materia con este ID o ajusta según tu base de datos
            'anio' => 2024,
            'horas_totales' => 120,
            'horas_teoricas' => 80,
            'horas_practicas' => 40,
            'DTE' => 11,
            'RTF' => 12,
            'creditos_academicos' => 10,
            'estado' => 'Completo por administración.',
            'area_tematica' => Plan::AREA_TEMATICA[1], // 'Formación aplicada'
            'fundamentacion' => 'Esta es la fundamentación creada por el profesor.',
            'obj_conceptuales' => 'Conceptuales - Profesor',
            'obj_procedimentales' => 'Procedimentales - Profesor',
            'obj_actitudinales' => 'Actitudinales - Profesor',
            'obj_especificos' => 'Objetivos específicos - Profesor',
            'cont_minimos' => 'Contenidos mínimos establecidos por el profesor.',
            'programa_analitico' => 'Programa analítico completo - Profesor',
            'act_practicas' => 'Actividades prácticas creadas por el profesor.',
            'modalidad' => 'Virtual',
            'bibliografia' => 'Bibliografía recomendada por el profesor.',
        ]);
        
        
    }
}
