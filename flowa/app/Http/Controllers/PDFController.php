<?php
namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Http\Request;

class PDFController extends Controller
{

    public function generatePDF2(Request $request)
    {
        $texto = $request->input('texto');
        $data = ['texto' => $texto];

        $pdf = PDF::loadView('pdf_template', $data);
        return $pdf->stream('document.pdf'); // Para vista previa
        // return $pdf->download('document.pdf'); // Para descarga directa
    }
}
    /*
    public function showForm()
    {
        return view('pdf_form');
    }

    public function generatePDF(Request $request)
    {
        $validated = $request->validate([
            'estado' => 'required|string|max:255',
            'anio' => 'required|integer',
            'horas_totales' => 'required|integer',
            'horas_teoricas' => 'required|integer',
            'horas_practicas' => 'required|integer',
            'DTE' => 'required|integer',
            'RTF' => 'required|integer',
            'creditos_academicos' => 'required|integer',
            'area_tematica' => 'required|string|max:255',
            'fundamentacion' => 'required|string',
            'cont_minimos' => 'required|string',
            'programa_analitico' => 'required|string',
            'act_practicas' => 'required|string',
            'modalidad' => 'required|string',
            'bibliografia' => 'required|string'
        ]);

        $pdf = PDF::loadView('pdf_template', $validated);

        // Para la vista previa
        if ($request->has('preview')) {
            return response($pdf->stream('document.pdf'), 200)
                ->header('Content-Type', 'application/pdf');
        }

        // Para descargar
        return $pdf->download('document.pdf');
    }
}
*/


/*
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\PDF;

class PDFController extends Controller
{
    public function crearPlan(Request $request)
    {
        // Validar los datos del formulario
        $validated = $request->validate([
            'area_tematica' => 'required|string|max:255',
            'anio' => 'required|integer',
            'horas_totales' => 'required|integer',
            'horas_teoricas' => 'required|integer',
            'horas_practicas' => 'required|integer',
            'DTE' => 'required|integer',
            'RTF' => 'required|integer',
            'creditos_academicos' => 'required|integer',
            'fundamentacion' => 'required|string|max:200',
            'cont_minimos' => 'required|string|max:255',
            'programa_analitico' => 'required|string|max:255',
            'act_practicas' => 'required|string|max:255',
            'modalidad' => 'required|string|max:255',
            'bibliografia' => 'required|string|max:255',
        ]);

        // Generar el PDF
        $pdf = PDF::loadView('administracion.plan_pdf', $validated);

        // Descargar el PDF
        return $pdf->download('plan.pdf');
    }
}
*/
