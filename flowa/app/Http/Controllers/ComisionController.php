<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comision;
use App\Models\Carrera;
use Illuminate\Support\Facades\Auth;
use App\Models\Plan;
use PhpOffice\PhpWord\TemplateProcessor;
use CloudConvert\Laravel\Facades\CloudConvert;
use CloudConvert\Models\Job;
use CloudConvert\Models\Task;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use Swagger\Client\Api\ConvertDocumentApi;
use Swagger\Client\Configuration;
use GuzzleHttp\Client as GuzzleClient;
use Aspose\Words\WordsApi;
use Aspose\Words\Model\Requests\ConvertDocumentRequest;
use ConvertApi\ConvertApi;
use Illuminate\Support\Str;


class ComisionController extends Controller
{
    public function index()
    {
    }

    public function dashboard()
    {
        // Lógica para la página principal de comision
        return view('comision.dashboard');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createByAdmin()
    {
        $carreras = Carrera::all();
        return view('administracion.crearcomision', compact('carreras'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createBySec()
    {
        $carreras = Carrera::all();
        return view('secretaria.crearcomision', compact('carreras'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'nombre_comision' => 'required|max:255|string',
                'apellido' => 'required|max:255|string',
                'DNI' => 'required|numeric',
                'legajo' => 'required|numeric',
                'email' => 'required|max:255|string',
                'carrera_responsable' => 'required|max:255|string',
            ]);

            $comisiones = new Comision();
            $comisiones->nombre_comision = $request->get('nombre_comision');
            $comisiones->apellido = $request->get('apellido');
            $comisiones->DNI = $request->get('DNI');
            $comisiones->legajo = $request->get('legajo');
            $comisiones->email = $request->get('email');
            $comisiones->carrera_responsable = $request->get('carrera_responsable');

            $comisiones->save();
            return redirect('/administracion')->with('estado', 'Nuevo usuario de la Comisión Curricular creado exitosamente.');
        } catch (\Exception $e) {
            return redirect('/administracion')->with('warning', 'No se ha podido crear el nuevo usuario. Detalles: ' . $e->getMessage());
        }
    }
    /*
    public function verPlan() 
    {
        return view('comision.verplan');
    }
    */

    public function showLoginForm()
    {
        return view('comision.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('/comision/dashboard');
        }

        return back()->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros.',
        ]);
    }

    /** ESTO POR AHORA FUNCIONA PARA DOCS PERO NO PARA PDF
     * Generar un documento Word basado en una plantilla y datos del modelo Plan.
     */
    /*
    public function pdfPrueba()
    {
        // traer el plan con id = 1
        $plan = Plan::with('materia')->findOrFail(1);

        // ruta de plantilla
        $templatePath = storage_path('app/plantillas/programa.docx');
        if (!file_exists($templatePath)) {
            abort(404, 'Plantilla no encontrada: ' . $templatePath);
        }

        $tpl = new TemplateProcessor($templatePath);

        /*
        // Mapear valores (ajustá los nombres si tu modelo Materia tiene otros atributos)
        $tpl->setValue('anio', $plan->anio ?? '');
        $tpl->setValue('horas_totales', $plan->horas_totales ?? '');
        $tpl->setValue('horas_teoricas', $plan->horas_teoricas ?? '');
        $tpl->setValue('horas_practicas', $plan->horas_practicas ?? '');
        $tpl->setValue('DTE', $plan->DTE ?? '');
        $tpl->setValue('RTF', $plan->RTF ?? '');
        $tpl->setValue('creditos_academicos', $plan->creditos_academicos ?? '');
        $tpl->setValue('area_tematica', $plan->area_tematica ?? '');

        // textos largos
        $tpl->setValue('fundamentacion', $plan->fundamentacion ?? '');
        $tpl->setValue('obj_conceptuales', $plan->obj_conceptuales ?? '');
        $tpl->setValue('obj_procedimentales', $plan->obj_procedimentales ?? '');
        $tpl->setValue('obj_actitudinales', $plan->obj_actitudinales ?? '');
        $tpl->setValue('obj_especificos', $plan->obj_especificos ?? '');
        $tpl->setValue('cont_minimos', $plan->cont_minimos ?? '');
        $tpl->setValue('programa_analitico', $plan->programa_analitico ?? '');
        $tpl->setValue('act_practicas', $plan->act_practicas ?? '');
        $tpl->setValue('modalidad', $plan->modalidad ?? '');
        $tpl->setValue('bibliografia', $plan->bibliografia ?? '');

        // datos relacionados con la materia (adaptá según tu esquema de Materia)
        $tpl->setValue('materia_nombre', optional($plan->materia)->nombre ?? '');
        $tpl->setValue('materia_codigo', optional($plan->materia)->codigo ?? '');
        $tpl->setValue('profesor', optional($plan->materia)->profesor ?? '');


        // Guardar resultado temporalmente
        $outFile = storage_path('app/public/programa_plan_.docx');
        $tpl->saveAs($outFile);

        // Forzar descarga y eliminar archivo luego de enviar
        return response()->download($outFile)->deleteFileAfterSend(true);
    }
        */

    public function pdfPrueba($id)
    {
        // Generar el DOCX
        $plan = Plan::with('materia.profesor', 'materia.correlativasFuertes', 'materia.correlativasDebiles')->findOrFail($id);
        $templatePath = storage_path('app/plantillas/programa.docx');
        $tpl = new TemplateProcessor($templatePath);

        $horasTeoricasSemana = $plan->horas_teoricas ? round($plan->horas_teoricas / 16, 1) : 0;
        $horasPracticasSemana = $plan->horas_practicas ? round($plan->horas_practicas / 16, 1) : 0;

        // --- Definición de Tags de Reemplazo ---
        // Salto de línea simple (dentro de un párrafo, útil para listas cortas)
        $BR = '</w:t><w:br/><w:t>';
        // Salto de Párrafo (más robusto para textos largos como fundamentación)
        $PARAGRAPH_BREAK = '</w:t></w:r></w:p><w:p><w:r><w:t>';
        // Salto de Página (nuevo)
        $PAGE_BREAK = '</w:t></w:r></w:p><w:r><w:br w:type="page" /></w:r><w:p><w:r><w:t>';

        // Campos simples (no requieren reemplazo)
        $tpl->setValue('anio', $plan->anio ?? '');
        $tpl->setValue('horas_teoricas', $plan->horas_teoricas ?? '');
        $tpl->setValue('horas_practicas', $plan->horas_practicas ?? '');
        $tpl->setValue('DTE', $plan->DTE ?? '');
        $tpl->setValue('RTF', $plan->RTF ?? '');
        $tpl->setValue('creditos_academicos', $plan->creditos_academicos ?? '');
        $tpl->setValue('area_tematica', $plan->area_tematica ?? '');

        $tpl->setValue('horas_teoricas_semana', $horasTeoricasSemana);
        $tpl->setValue('horas_practicas_semana', $horasPracticasSemana);

        // --- Lógica de Correlativas (Generación y Reemplazo) ---
        $correlativasFuertes = $plan->materia->correlativasFuertes
            ->map(fn ($m) => "{$m->nombre_materia} ({$m->codigo_materia})")
            ->implode("\n");

        $correlativasDebiles = $plan->materia->correlativasDebiles
            ->map(fn ($m) => "{$m->nombre_materia} ({$m->codigo_materia})")
            ->implode("\n");

        // Reemplazo en correlativas (Se usa BR)
        $tpl->setValue('correlativas_fuertes', str_replace("\n", $BR, $correlativasFuertes));
        $tpl->setValue('correlativas_debiles', str_replace("\n", $BR, $correlativasDebiles));

        // --- Textos Largos (USANDO PARAGRAPH_BREAK PARA MAYOR SEGURIDAD) ---
        // Usa el salto de párrafo para estos campos, ya que pueden tener varios párrafos y es más seguro.
        $tpl->setValue('fundamentacion', str_replace("\n", $PARAGRAPH_BREAK, $plan->fundamentacion ?? ''));
        $tpl->setValue('obj_conceptuales', str_replace("\n", $PARAGRAPH_BREAK, $plan->obj_conceptuales ?? ''));
        $tpl->setValue('obj_procedimentales', str_replace("\n", $PARAGRAPH_BREAK, $plan->obj_procedimentales ?? ''));
        $tpl->setValue('obj_actitudinales', str_replace("\n", $PARAGRAPH_BREAK, $plan->obj_actitudinales ?? ''));
        $tpl->setValue('obj_especificos', str_replace("\n", $PARAGRAPH_BREAK, $plan->obj_especificos ?? ''));
        $tpl->setValue('cont_minimos', str_replace("\n", $PARAGRAPH_BREAK, $plan->cont_minimos ?? ''));
        $tpl->setValue('programa_analitico', str_replace("\n", $PARAGRAPH_BREAK, $plan->programa_analitico ?? ''));
        $tpl->setValue('act_practicas', str_replace("\n", $PARAGRAPH_BREAK, $plan->act_practicas ?? ''));
        $tpl->setValue('modalidad', str_replace("\n", $PARAGRAPH_BREAK, $plan->modalidad ?? ''));

        // Bibliografía (Usando salto de párrafo)
        $tpl->setValue('bibliografia', str_replace("\n", $PARAGRAPH_BREAK, $plan->bibliografia ?? ''));

        // --- Salto de Página (NUEVO) ---
        // Añade un salto de página después de la bibliografía.
        // **Necesitas tener un placeholder en tu plantilla llamado ${salto_pagina}**
        // Si no tienes un placeholder específico, debes agregarlo al final del campo bibliografia.
        // Lo más fácil es crear un nuevo placeholder en la plantilla, por ejemplo, ${salto_pagina_final}
        $tpl->setValue('salto_pagina', $PAGE_BREAK); // Asumiendo que existe ${salto_pagina}

        // Datos relacionados con la materia (campos simples)
        $tpl->setValue('materia_nombre', $plan->materia->nombre_materia ?? '');
        $tpl->setValue('materia_codigo', $plan->materia->codigo_materia ?? '');

        $profesor = $plan->materia->profesor
            ? $plan->materia->profesor->apellido_profesor . ', ' . $plan->materia->profesor->nombre_profesor
            : '';

        $tpl->setValue('profesor', $profesor);

        $tempDocx = storage_path('app/temp/programa_plan_.docx');
        $tpl->saveAs($tempDocx);

        // ⚠️ ¡IMPORTANTE! Vuelve a activar la conversión a PDF si quieres que funcione
        // Si necesitas seguir depurando el DOCX, deja el return de abajo descomentado y comenta la lógica de ConvertAPI.
        return response()->download($tempDocx, 'documento_para_inspeccion.docx')->deleteFileAfterSend(false);
        /*
        // Crear el job de CloudConvert
        $job = (new Job())
            ->addTask(new Task('import/upload', 'upload-docx'))
            ->addTask(
                (new Task('convert', 'convert-to-pdf'))
                    ->set('input', 'upload-docx')
                    ->set('output_format', 'pdf')
            )
            ->addTask(
                (new Task('export/url', 'export-pdf'))
                    ->set('input', 'convert-to-pdf')
            );

        // Crear job usando el facade
        $job = CloudConvert::jobs()->create($job);

        // Subir el archivo
        $uploadTask = $job->getTasks()->whereName('upload-docx')[0];
        $inputStream = fopen($tempDocx, 'r');
        CloudConvert::tasks()->upload($uploadTask, $inputStream);

        // Esperar a que termine la conversión
        $job = CloudConvert::jobs()->wait($job);

        // Obtener URL del PDF
        $exportTask = $job->getExportUrls()[0];
        $pdfUrl = $exportTask->url;

        // Devolver PDF al navegador
        return response()->streamDownload(function () use ($pdfUrl) {
            echo file_get_contents($pdfUrl);
        }, 'programa_plan.pdf');
        */

        // return response()->download($tempDocx, 'programa_plan.docx')->deleteFileAfterSend(true);


        /*
        // 2️⃣ Convertir DOCX → PDF con Cloudmersive
        try {
            $config = Configuration::getDefaultConfiguration()
                ->setApiKey('Apikey', env('CLOUDMERSIVE_API_KEY'));

            $apiInstance = new ConvertDocumentApi(new GuzzleClient(), $config);
            $inputFile = new \SplFileObject($tempDocx);

            // Realiza la conversión
            $result = $apiInstance->convertDocumentDocxToPdf($inputFile);

            // Guardar el PDF temporalmente
            $pdfPath = storage_path('app/temp/programa_plan_.pdf');
            file_put_contents($pdfPath, $result);

            // 3️⃣ Devolver el PDF al navegador
            return response()->download($pdfPath, 'programa_plan.pdf')->deleteFileAfterSend(true);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al convertir el documento: ' . $e->getMessage()
            ], 500);
        }
        */

        /*
        try {
            // 1. Inicializar la API
            $secret = 't3wp2UziEojYMwdPhqcrXQ15AfGkwObk'; // env('CONVERTAPI_SECRET');
            if (!$secret) {
                throw new \Exception('CONVERTAPI_SECRET no está configurada.');
            }
            ConvertApi::setApiCredentials($secret);

            // 🔹 Armar el nombre de salida según la materia
            $materiaNombre = Str::slug($plan->materia->nombre_materia ?? 'programa', '_');
            $materiaCodigo = $plan->materia->codigo_materia ?? 'sin_codigo';
            $anio = now()->year;

            $outputFileName = "{$materiaNombre}-{$materiaCodigo}-({$anio}).pdf";
            $pdfPath = storage_path('app/temp/' . $outputFileName);

            // 2. Realizar la conversión en una sola llamada
            // fromFile() hace la carga, conversión y descarga del resultado automáticamente
            $result = ConvertApi::convert(
                'pdf', // Formato de destino
                ['File' => $tempDocx], // Archivo de origen
                'docx' // Formato de origen
            );

            // 3. Guardar el archivo PDF
            // La conversión devuelve una colección de objetos File. Tomamos el primero.
            $result->getFile()->save($pdfPath);

            // 4. Devolver el PDF
            // 🗑️ Limpia el DOCX temporal
            unlink($tempDocx);

            // 📄 Abrir PDF en el navegador
            return response()->file($pdfPath, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => "inline; filename=\"{$outputFileName}\""
            ]);
        } catch (\Throwable $e) {
            return response()->json(['error' => 'Error al convertir con ConvertAPI: ' . $e->getMessage()], 500);
        }
        */
    }
}
