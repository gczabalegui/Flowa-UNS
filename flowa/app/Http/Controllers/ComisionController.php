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

    public function pdfPrueba()
    {
        // Generar el DOCX
        $plan = Plan::with('materia')->findOrFail(1);
        $templatePath = storage_path('app/plantillas/programa.docx');
        $tpl = new TemplateProcessor($templatePath);

        /*
        $tpl->setValue('anio', $plan->anio ?? '');
        $tpl->setValue('horas_totales', $plan->horas_totales ?? '');
        // ... todos los demás campos
        */

        $tempDocx = storage_path('app/temp/programa_plan_.docx');
        $tpl->saveAs($tempDocx);

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
    }
}
