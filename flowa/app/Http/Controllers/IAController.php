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

        // 1. Lee la clave API del archivo .env
        $geminiApiKey = env('GEMINI_API_KEY'); 
        
        if (empty($geminiApiKey)) {
             return response()->json(['error' => 'La clave API de Gemini no está configurada.'], 500);
        }
        
        // 2. URL de la API de Gemini (modelo flash optimizado)
        $url_ia = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent?key={$geminiApiKey}";

        // 3. Prompt optimizado
        $prompt = "Convierte **toda** la siguiente lista de referencias bibliográficas al formato **APA 7ma edición** (en español), asegurándote de que estén ordenadas **alfabéticamente** por el apellido del primer autor. Devuelve **SOLO** la lista corregida, sin ningún texto adicional, explicaciones, encabezados, introducciones o comentarios antes o después de la lista.\n\nLista de Bibliografía a Corregir:\n{$texto}";

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

            // Manejo de errores de conexión/API
            if (!$response->successful()) {
                Log::error('Error de API de Gemini: ' . $response->body());
                return response()->json([
                    'error' => 'Error al conectar con la API de IA.',
                    'status' => $response->status(),
                    'detail' => $response->json('error.message', 'Error desconocido')
                ], 500);
            }

            $data = $response->json();
            
            // Extracción segura del texto generado
            $text = $data['candidates'][0]['content']['parts'][0]['text'] ?? null;

            if ($text) {
                // Limpieza del texto y eliminación de caracteres no deseados
                $textLimpio = trim($text); 
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