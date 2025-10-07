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
            'estado' => 'Aprobado por secretaría académica.',
            'area_tematica' => Plan::AREA_TEMATICA[1], // 'Formación aplicada'
            'fundamentacion' => 'La asignatura aborda los principios básicos de la genética, con aplicaciones en mejoramiento vegetal y animal.',
            'obj_conceptuales' => 'Comprender los fundamentos de la herencia y la variabilidad genética.',
            'obj_procedimentales' => 'Procedimentales - Profesor',
            'obj_actitudinales' => 'Actitudinales - Profesor',
            'obj_especificos' => 'Objetivos específicos - Profesor',
            'cont_minimos' => 'Contenidos mínimos establecidos por el profesor.',
            'programa_analitico' => 'UNIDAD 1: El material hereditario y los cromosomas.  
Material hereditario, DNA, organización cromosómica, ciclo celular, mitosis y meiosis.  
UNIDAD 2: Transmisión de los caracteres hereditarios.  
Análisis mendeliano, teoría cromosómica, ligamiento, genoma extranuclear, reproducción vegetal.  
UNIDAD 3: Variación del material génico.  
Mutación, variaciones estructurales y numéricas, euploidía, aneuploidía.  
UNIDAD 4: Los genes en las poblaciones.  
Equilibrio Hardy-Weinberg, deriva génica, selección, genética cuantitativa.  
UNIDAD 5: Mejoramiento vegetal.  
Recursos genéticos, selección, heterosis, programas de mejora.  
UNIDAD 6: Mejoramiento animal.  
Selección, QTL, cruzamientos, valor reproductivo.  
UNIDAD 7: Principios de biotecnología.  
Ingeniería genética, marcadores moleculares, organismos transgénicos, edición génica (CRISPR-Cas9).',
            'act_practicas' => '
1. Observación de mitosis y meiosis.  
2. Cruzamientos con Drosophila melanogaster.  
3. Análisis de herencia cuantitativa con maíz o trigo.  
4. Actividad de bioinformática aplicada.  
Actividad extra: visita guiada al Laboratorio de Biotecnología del CERZOS-CONICET.',
            'modalidad' => 'Virtual',
            'bibliografia' => 'CARDELINO R. y ROVIRA J. (1990). Mejoramiento genético animal.  
CUBERO, J.I. (2013). Introducción a la mejora genética vegetal.  
GRIFFITHS AJ et al. (2020). Genética. Introducción al Análisis Genético. McGraw-Hill.  
LEVITUS, G. et al. (2010). Biotecnología y mejoramiento vegetal II. INTA.  
STRICKBERGER M. (1993). Genética. Omega.'
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
            'estado' => 'Completo por profesor.',
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
            'estado' => 'Completo por profesor.',
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

        Plan::create([
            'materia_id' => 7, // Asegúrate de tener una materia con este ID o ajusta según tu base de datos
            'anio' => 2021,
            'horas_totales' => 120,
            'horas_teoricas' => 80,
            'horas_practicas' => 40,
            'DTE' => 11,
            'RTF' => 12,
            'creditos_academicos' => 10,
            'estado' => 'Completo por administración.',
            'area_tematica' => Plan::AREA_TEMATICA[0], // 'Formación aplicada'
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
            'materia_id' => 8, // Asegúrate de tener una materia con este ID o ajusta según tu base de datos
            'anio' => 2015,
            'horas_totales' => 120,
            'horas_teoricas' => 80,
            'horas_practicas' => 40,
            'DTE' => 11,
            'RTF' => 12,
            'creditos_academicos' => 10,
            'estado' => 'Completo por profesor.',
            'area_tematica' => Plan::AREA_TEMATICA[2], // 'Formación aplicada'
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
