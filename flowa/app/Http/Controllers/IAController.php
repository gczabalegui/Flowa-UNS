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

    public function sugerirArea(Request $request)
    {
        // Campos esperados
        $campos = $request->only([
            'fundamentacion',
            'obj_conceptuales',
            'obj_procedimentales',
            'obj_actitudinales',
            'cont_minimos',
            'act_practicas',
            'programa_analitico',
            'horas_teoricas',
            'horas_practicas',
            'anio'
        ]);

        Log::info('➡️ Campos recibidos del frontend:', $campos);

        // Validación de campos vacíos
        foreach ($campos as $key => $value) {
            if (!isset($value) || trim((string)$value) === '') {
                Log::warning("⚠️ Campo incompleto detectado: $key => '$value'");
                return response()->json([
                    'error' => 'Campos incompletos.',
                    'campo' => $key
                ], 400);
            }
        }

        $geminiApiKey = env('GEMINI_API_KEY');
        $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent?key={$geminiApiKey}";

        $prompt = "
Analiza el siguiente conjunto de información sobre una asignatura universitaria y determina a cuál de las siguientes áreas pertenece:
1. Formación básica
2. Formación profesional
3. Formación aplicada

Criterios:
- **Formación básica:** conocimientos teóricos y generales, fundamentos científicos o metodológicos comunes.
- **Formación profesional:** aplicación de fundamentos a situaciones o técnicas propias de la disciplina.
- **Formación aplicada:** integración de saberes en proyectos, prácticas, talleres o contextos reales.

Responde en formato JSON:
{
  \"area\": \"básica\" | \"profesional\" | \"aplicada\",
  \"razonamiento\": \"explicación breve (1 párrafo) del por qué\"
}

Información de la materia:
" . json_encode($campos, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

        try {
            Log::info('➡️ Solicitando sugerencia de área a Gemini...');

            $response = Http::timeout(60)->post($url, [
                'contents' => [
                    [
                        'parts' => [['text' => $prompt]]
                    ]
                ]
            ]);

            $raw = $response->body();
            Log::info('✅ Respuesta cruda de Gemini:', ['body' => $raw]);

            // Primer parseo: obtener la estructura principal de Gemini
            $outer = json_decode($raw, true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new \Exception('Respuesta no es JSON válido: ' . json_last_error_msg());
            }

            // Buscar el texto dentro del campo anidado
            $innerText = $outer['candidates'][0]['content']['parts'][0]['text'] ?? null;

            if (!$innerText) {
                Log::warning('⚠️ No se encontró texto en la respuesta de Gemini', ['outer' => $outer]);
                return response()->json(['error' => 'Respuesta sin contenido de IA.'], 500);
            }

            // Limpiar delimitadores y caracteres extraños
            $innerText = preg_replace('/^```json\s*|```$/m', '', $innerText);
            $innerText = html_entity_decode($innerText, ENT_QUOTES | ENT_HTML5, 'UTF-8');
            $innerText = str_replace(['“', '”', '‘', '’'], ['"', '"', "'", "'"], $innerText);
            $innerText = trim($innerText);

            // Segundo parseo: decodificar el JSON que realmente nos interesa
            $parsed = json_decode($innerText, true);

            if (json_last_error() === JSON_ERROR_NONE && isset($parsed['area'])) {
                Log::info('✅ JSON interno parseado correctamente', $parsed);
                return response()->json($parsed);
            }

            Log::warning('⚠️ No se pudo parsear el JSON interno', [
                'inner_raw' => $innerText,
                'json_error' => json_last_error_msg()
            ]);

            return response()->json([
                'error' => 'Formato de respuesta inesperado.',
                'raw' => $raw
            ], 500);
        } catch (\Exception $e) {
            Log::error('❌ Excepción al consultar IA:', ['message' => $e->getMessage()]);
            return response()->json(['error' => 'Excepción: ' . $e->getMessage()], 500);
        }
    }
}
