<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class IAController extends Controller
{
    public function sugerirBibliografia(Request $request)
    {
        $texto = trim($request->input('texto'));

        if (empty($texto)) {
            return response()->json(['error' => 'Texto vacío.'], 400);
        }

        $geminiApiKey = env('GEMINI_API_KEY'); 
        
        if (empty($geminiApiKey)) {
            return response()->json(['error' => 'La clave API de Gemini no está configurada.'], 500);
        }
        
        $url_ia = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent?key={$geminiApiKey}";

        // Prompt optimizado para salida segura para Word
        $prompt = "Convierte toda la siguiente lista de referencias bibliográficas al formato APA 7ma edición (en español), asegurándote de que estén ordenadas alfabéticamente por el apellido del primer autor. **Devuelve SOLO texto plano**, sin HTML, sin caracteres especiales invisibles, sin negritas, cursivas, ni saltos de línea raros. Usa únicamente saltos de línea normales '\\n' entre cada referencia. No agregues encabezados, explicaciones ni comentarios antes o después de la lista.\n\nLista de Bibliografía a Corregir:\n{$texto}";

        try {
            $response = Http::timeout(60)
                ->post($url_ia, [
                    'contents' => [
                        [
                            'parts' => [
                                ['text' => $prompt]
                            ]
                        ]
                    ]
                ]);

            if (!$response->successful()) {
                Log::error('Error de API de Gemini: ' . $response->body());
                return response()->json([
                    'error' => 'Error al conectar con la API de IA.',
                    'status' => $response->status(),
                    'detail' => $response->json('error.message', 'Error desconocido')
                ], 500);
            }

            $data = $response->json();
            $text = $data['candidates'][0]['content']['parts'][0]['text'] ?? null;

            if ($text) {
                // Limpieza mínima extra para Word
                $textLimpio = trim($text);
                $textLimpio = str_replace(["\r\n", "\r"], "\n", $textLimpio); // normaliza saltos de línea
                $textLimpio = preg_replace('/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]/u', '', $textLimpio); // control chars
                return response()->json(['sugerencia' => $textLimpio]);
            } else {
                Log::warning('Respuesta de IA incompleta/vacía: ' . json_encode($data));
                return response()->json(['error' => 'La IA devolvió una respuesta vacía o incompleta.'], 500);
            }
        } catch (\Exception $e) {
            Log::error('Excepción en IAController: ' . $e->getMessage());
            return response()->json(['error' => 'Excepción de red o servidor: ' . $e->getMessage()], 500);
        }
    }
}
