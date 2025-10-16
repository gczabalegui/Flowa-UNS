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

        Plan::create([
            'materia_id' => 9, // Asegúrate de tener una materia con este ID o ajusta según tu base de datos
            'anio' => 2023,
            'horas_totales' => 144,
            'horas_teoricas' => 46,
            'horas_practicas' => 98,
            'DTE' => 11,
            'RTF' => 12,
            'creditos_academicos' => 10,
            'estado' => 'Aprobado por secretaría académica.',
            'area_tematica' => Plan::AREA_TEMATICA[1], // 'Formación aplicada'
            'fundamentacion' => 'La materia se propone brindar a los estudiantes de Ingeniería Agronómica los principales conocimientos sobre la
célula considerando la estructura, función y bioquímica celular. Inicialmente se presenta la materia y porqué se
inserta en la carrera de Ingeniería Agronómica, su conjunción con otras materias y la importancia en el mundo
agronómico. Luego se estudia la composición de los organismos vivos, fuente de carbono y de energía en los
distintos tipos de organismos. Se explican las principales macromoléculas que constituyen las células, sus
estructuras químicas y sus funciones celulares. Se estudian la estructura y organización celulares y las organelas
subcelulares, y se analizan las diferencias entre procariotas y eucariotas, y entre células animales y vegetales. Se
discuten aspectos del metabolismo energético, la síntesis de biomoléculas y los mecanismos de transmisión y
expresión de la información genética en los seres vivos. Se introducen las vías de transmisión de señales inter e
intracelulares y se presentan hormonas animales y vegetales. En el curso se hace un énfasis particular en procesos
específicos de interés agronómico, como la fotosíntesis, la reducción y asimilación del N y del S, el metabolismo en
el rumen, ciclo del glioxilato y mecanismos de señalización y aplicaciones de las fitohormonas. Finalmente, se
analizan los fundamentos bioquímicos de la integración y regulación del metabolismo. La materia se propone lograr
que el alumno adquiera una comprensión general de la organización y funcionamiento celular, y del rol de las
moléculas y procesos metabólicos celulares, aplicando los conceptos a temas de relevancia agronómica. A corto
plazo, este conocimiento es esencial para la comprensión y el aprendizaje de conceptos que se desarrollarán en
materias que forman parte de su formación de pregrado, como Genética, Fisiología, Nutrición Animal, Microbiología
y Producción Vegetal. A largo plazo, la asignatura se propone brindar una base indispensable para una mejor
comprensión y evaluación de los procesos biológicos y los productos biotecnológicos que empleará durante su
actividad profesional.
',
            'obj_conceptuales' => 'Comprender los fundamentos de la herencia y la variabilidad genética.',
            'obj_procedimentales' => 'Procedimentales - Profesor',
            'obj_actitudinales' => 'Actitudinales - Profesor',
            'obj_especificos' => 'Objetivos específicos - Profesor',
            'cont_minimos' => 'Contenidos mínimos establecidos por el profesor.',
            'programa_analitico' => '1. ESTRUCTURA DE LAS BIOMOLECULAS
Para qué sirve estudiar Química biológica y cómo se relaciona con la Agronomía. Tipos de enlace químico.
Enlaces covalentes. Aspectos energéticos. Enlaces por puente hidrógeno, iónico e interacciones
hidrofóbicas. Influencia de las uniones no covalentes y el agua sobre la solubilidad y estructura
tridimensional de las biomoléculas. El agua: ionización, soluciones. Concepto de pH y fuerza iónica, ácidos
y bases. Ósmosis y presión osmótica. Biomembranas. Aminoácidos. Estructura. Enlace peptídico. Punto
isoeléctrico. Proteínas. Propiedades. Apoproteínas y proteínas conjugadas. Niveles de organización
estructural: estructura primaria, secundaria, terciaria, cuaternaria. Desnaturalización. Conformación,
dinámica y funciones de las proteínas.Lípidos. Estructura y propiedades de ácidos grasos, triacilgliceroles,
fosfolípidos, esteroles y esfingolípidos.Funciones.Hidratos de carbono. Monosacáridos. Estructuras
cíclicas. Formas anoméricas. Enlace glicosídico.Polisacáridos estructurales y de almacenamiento
energético. Estructura del glucógeno, almidón y celulosa.Glicoproteínas. Funciones. Ácidos nucleicos.
Composición química y estructura de los nucleótidos. Funciones. Enlace fosfodiéster.ADN. Estructura de la
doble hélice. ARN. Estructura. Tipos de ARN: mensajero, de transferencia, ribosomal, microARN.
Ribozimas. Composición química de animales y plantas. Composición de carne, leche, aceites.
2. ESTRUCTURA Y FUNCION CELULAR
Célula procariota. Célula eucariota. Núcleo. Estructura y funciones de organelas subcelulares. Mitocondria.
Sistema de endomembranas. Retículo endoplasmático liso y rugoso. Complejo de Golgi. Lisosomas.
Peroxisoma. Citoesqueleto. Proteosoma. Diferencias entre célula animal y vegetal. Cloroplastos. Vacuolas
y vesículas especializadas. Glioxisoma. Pared celular. Énfasis en relación estructura-función.
Especialización celular. Estructura y función de biomembranas. Componentes estructurales: lípidos,
proteínas extrínsecas e intrínsecas. Ultraestructura de la membrana. Modelos de Membrana.
Compartimentalización. Propiedades físico-químicas de la membrana: fluidez, difusión lateral de lípidos y
proteínas, rol del colesterol. Asimetría. Permeabilidad selectiva. Transporte: Difusión simple y facilitada,
transporte activo: co ycontratransporte. Canales iónicos. Canales de agua (acuaporinas). Na+/K+ y Ca2+
ATPasas. Bombas de protones. Endocitosis y exocitosis. Membrana plasmática. Funciones. Métodos de
estudio de la estructura y función celular. Fraccionamiento subcelular. Ultracentrifugación. Utilización de radiosótopos. Microscopía. Métodos de separación y análisis de biomoléculas. Cromatografía.
Electroforesis. Técnicas inmunoquímicas y de hibridización. ',
            'act_practicas' => '
TP N 1: Bioseguridad y el laboratorio de Química biológica.
TP N° 2: Generalidades de la Proteínas. Determinación del Punto Isoeléctrico de la Caseína.
TP N 3: Fotometría y Proteínas: Extracción de proteínas vegetales y su determinación cuantitativa.
TP N 4: Enzimas: Determinación de la actividad de la fosfatasa ácida vegetal a diferentes temperaturas.
Determinación de Km y Vmáx. Inhibición por fosfato inorgánico.
TP N5: Extracción, visualización y cuantificación de ADN vegetal y de hígado de pollos de cría.
TP N6: Fotosíntesis: Aislamiento de cloroplastos- Efecto del DCMU y evidencia de la necesidad de luz en
la etapa fotodependiente. Separación de pigmentos fotosintéticos (cromatografía). Ensayo de solubilidad
diferencial.
TP N7: Efecto de hormonas sobre el metabolismo de Hidratos de Carbono: Efecto de la adrenalina sobre
el glucógeno de hígado bovino. Repercusiones sobre la producción de carne.',
            'modalidad' => 'Virtual',
            'bibliografia' => '-Lehninger: Principios de Bioquímica. Nelson y Cox. 6ª Edición. Editorial Omega. 2014.
-Bioquímica: Conceptos esenciales. Feduchi, Romero, Conde, Blasco, García-Hoz. 2ª
edición. Editorial Médica Panamericana. 2015.
-Fundamentos de Bioquímica. Voet, Voet, Pratt. 4ª edición. Ed. Médica Panamericana.
2016.
-Biología Molecular de la célula. Alberts, Johnson, Lewis, Morgan, Roberts, Walter. 6a
edición. Omega. 2016.
-Biología Celular y Molecular. Lodish, Berk, Kaiser, Krieger, Bretscher, Ploegh, Amon,
Scott. 7a edición Editorial Panamericana. 2016.
-Essential Cell Biology. Alberts, Bray, Hopkin, Johnson, Lewis, Raff, Roberts, Walter.
4th edition. Garland Science, Taylor & Francis Group. EEUU, 2014.
-Molecular Biology of the Cell. Alberts, Johnson, Lewis, Morgan, Raff, Roberts and
Walter. 6th Edition. Garland Science, Taylor & Francis Group. EEUU, 2014.
-Introducción a la Biología Celular. Alberts, Bray, Hopkin, Johnson, Lewis, Raff,
Roberts, Walter. 3° Edición. Ed. Médica Panamericana. 2011.
-Bioquímica. Stryer. 7ª edición. Reverté. 2013.
-www.freebooks4doctors.com (página que contiene links de acceso gratuito a libros de
texto).'
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
