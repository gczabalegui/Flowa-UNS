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
