<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class ImageController extends Controller
{
    public function upload()
    {
        return view('/administracion/cargarplan');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'pdf_file' => 'required|mimes:pdf|max:2048', // Asegura que sea un archivo PDF y no supere los 2 MB
        ]);

        if ($request->hasFile('pdf_file')) {
            $extension  = $request->file('pdf_file')->getClientOriginalExtension();
            $pdf_name = time() . '_' . $request->title . '.' . $extension;
            $path = $request->file('pdf_file')->storeAs(
                'pdf_files',
                $pdf_name,
                's3'
            );

            // Lógica adicional según sea necesario

            return redirect()->back()->with([
                'message' => 'El archivo se subió correctamente',
            ]);
        }
    }
}
