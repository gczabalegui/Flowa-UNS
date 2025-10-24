<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comision;
use App\Models\Carrera;
use Illuminate\Support\Facades\Auth;
use App\Models\Plan;
use PhpOffice\PhpWord\TemplateProcessor;
use ConvertApi\ConvertApi;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;


class ComisionController extends Controller
{
    public function index()
    {
    }

    public function dashboard()
    {
        // Total de planes
        $totalPlanes = Plan::count();

        // Planes aprobados por secretaría
        $totalPlanesAprobados = Plan::where('estado', 'Aprobado por secretaría académica.')->count();

        // Planes esperando ser completados por profesor
        $planesPendientesProfesor = Plan::where('estado', 'Completo por administración.')->count();

        // Top 5 profesores con más planes asociados
        $topProfesores = Plan::with('materia.profesor')
            ->get()
            ->groupBy(function ($plan) {
                $profesor = $plan->materia->profesor ?? null;
                return $profesor ? $profesor->nombre_profesor . ' ' . $profesor->apellido_profesor : 'Sin profesor';
            })
            ->map(function ($planes) {
                return count($planes);
            })
            ->sortDesc()
            ->take(5);

        return view('comision.dashboard', compact(
            'totalPlanes',
            'totalPlanesAprobados',
            'planesPendientesProfesor',
            'topProfesores'
        ));
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
        // Buscar el plan con relaciones
        $plan = Plan::with('materia.profesor', 'materia.correlativasFuertes', 'materia.correlativasDebiles')->findOrFail($id);

        $templatePath = storage_path('app/plantillas/programa.docx');
        $tpl = new TemplateProcessor($templatePath);

        $horasTeoricasSemana = $plan->horas_teoricas ? round($plan->horas_teoricas / 16, 1) : 0;
        $horasPracticasSemana = $plan->horas_practicas ? round($plan->horas_practicas / 16, 1) : 0;

        // Valores simples
        $tpl->setValue('anio', $plan->anio ?? '');
        $tpl->setValue('horas_teoricas', $plan->horas_teoricas ?? '');
        $tpl->setValue('horas_practicas', $plan->horas_practicas ?? '');
        $tpl->setValue('DTE', $plan->DTE ?? '');
        $tpl->setValue('RTF', $plan->RTF ?? '');
        $tpl->setValue('creditos_academicos', $plan->creditos_academicos ?? '');
        $tpl->setValue('area_tematica', $plan->area_tematica ?? '');
        $tpl->setValue('horas_teoricas_semana', $horasTeoricasSemana);
        $tpl->setValue('horas_practicas_semana', $horasPracticasSemana);

        // Correlativas
        $correlativasFuertes = $plan->materia->correlativasFuertes
            ->map(fn ($m) => "{$m->nombre_materia} ({$m->codigo_materia})")
            ->implode("\n");
        $correlativasDebiles = $plan->materia->correlativasDebiles
            ->map(fn ($m) => "{$m->nombre_materia} ({$m->codigo_materia})")
            ->implode("\n");

        // Si no hay correlativas, agregar texto predeterminado
        $textoSinCorrelativas = 'No hay correlativas asociadas.';
        if (empty(trim($correlativasFuertes))) {
            $correlativasFuertes = $textoSinCorrelativas;
        }
        if (empty(trim($correlativasDebiles))) {
            $correlativasDebiles = $textoSinCorrelativas;
        }

        // Word usa \n, no <br>, así que no hace falta nl2br()
        $tpl->setValue('correlativas_fuertes', $correlativasFuertes);
        $tpl->setValue('correlativas_debiles', $correlativasDebiles);

        // Textos largos
        $tpl->setValue('fundamentacion', $plan->fundamentacion ?? '');
        $tpl->setValue('obj_conceptuales', $plan->obj_conceptuales ?? '');
        $tpl->setValue('obj_procedimentales', $plan->obj_procedimentales ?? '');
        $tpl->setValue('obj_actitudinales', $plan->obj_actitudinales ?? '');
        $tpl->setValue('obj_especificos', $plan->obj_especificos ?? '');
        $tpl->setValue('cont_minimos', $plan->cont_minimos ?? '');
        $tpl->setValue('programa_analitico', $plan->programa_analitico ?? '');
        $tpl->setValue('act_practicas', $plan->act_practicas ?? '');
        $tpl->setValue('modalidad', $plan->modalidad ?? '');
        $tpl->setValue('bibliografia', $this->sanitizeBibliografia($plan->bibliografia ?? ''), true);

        // Datos de la materia
        $tpl->setValue('materia_nombre', $plan->materia->nombre_materia ?? '');
        $tpl->setValue('materia_codigo', $plan->materia->codigo_materia ?? '');
        $profesor = $plan->materia->profesor
            ? $plan->materia->profesor->apellido_profesor . ', ' . $plan->materia->profesor->nombre_profesor
            : '';
        $tpl->setValue('profesor', $profesor);

        // Guardar DOCX temporal
        $tempDocx = storage_path('app/temp/programa_plan_.docx');
        $tpl->saveAs($tempDocx);

        /*
        // Asegurate que el archivo fue creado
        if (!file_exists($tempDocx)) {
            Log::error("DOCX no existe: {$tempDocx}");
            return response()->json(['error' => 'El archivo DOCX no fue creado.'], 500);
        }

        // Registrar tamaño para depuración
        $size = filesize($tempDocx);
        Log::info("DOCX creado: {$tempDocx} (size: {$size} bytes)");

        $downloadFileName = 'programa_plan_prueba.docx';
        return response()->download($tempDocx, $downloadFileName)->deleteFileAfterSend(false);
*/
        try {
            // Configurar ConvertAPI
            $secret = 't3wp2UziEojYMwdPhqcrXQ15AfGkwObk'; // o env('CONVERTAPI_SECRET');
            if (!$secret) {
                throw new \Exception('CONVERTAPI_SECRET no está configurada.');
            }

            ConvertApi::setApiCredentials($secret);

            // Nombre de salida
            $materiaNombre = Str::slug($plan->materia->nombre_materia ?? 'programa', '_');
            $materiaCodigo = $plan->materia->codigo_materia ?? 'sin_codigo';
            $anio = now()->year;

            $outputFileName = "{$materiaNombre}-{$materiaCodigo}-({$anio}).pdf";
            // Eliminar saltos de línea por si acaso
            $outputFileName = str_replace(["\n", "\r"], '', $outputFileName);

            $pdfPath = storage_path('app/temp/' . $outputFileName);

            // Convertir a PDF
            $result = ConvertApi::convert(
                'pdf',
                ['File' => $tempDocx],
                'docx'
            );

            // Guardar PDF
            $result->getFile()->save($pdfPath);

            // Eliminar DOCX temporal
            @unlink($tempDocx);

            // Devolver PDF en navegador
            return response()->file($pdfPath, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="' . $outputFileName . '"'
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'error' => 'Error al convertir con ConvertAPI: ' . $e->getMessage()
            ], 500);
        }
    }


    /**
     * Limpia texto para insertarlo con TemplateProcessor en un .docx.
     * - Normaliza encoding y saltos de línea
     * - Elimina BOM y caracteres de control inválidos
     * - Quita etiquetas HTML
     * - Colapsa saltos de línea excesivos
     */
    function sanitizeBibliografia(string $text): string
    {
        // Asegurar UTF-8
        $text = mb_convert_encoding($text, 'UTF-8', 'UTF-8');

        // Quitar BOM
        $text = preg_replace('/\x{FEFF}/u', '', $text);

        // Eliminar etiquetas HTML
        $text = strip_tags($text);

        // Normalizar saltos de línea
        $text = str_replace(["\r\n", "\r"], "\n", $text);

        // Reemplazar tabulaciones por espacios
        $text = str_replace("\t", " ", $text);

        // Eliminar caracteres de control no permitidos en Word/XML (excepto \n)
        $text = preg_replace('/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]/u', '', $text);

        // Eliminar caracteres Unicode extraños que Word podría rechazar
        $text = preg_replace('/[\x{202A}-\x{202E}]/u', '', $text); // LTR/RTL marks

        // Escapar caracteres especiales de XML que rompen el docx
        $text = str_replace(['&', '<', '>'], ['&amp;', '&lt;', '&gt;'], $text);

        // Reemplazar múltiples saltos de línea por máximo dos
        $text = preg_replace("/\n{3,}/", "\n\n", $text);

        // Recortar espacios al inicio y final de cada línea
        $text = preg_replace('/^[ \t]+/m', '', $text);
        $text = trim($text);

        return $text;
    }
}
