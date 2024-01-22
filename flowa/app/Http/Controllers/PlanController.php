<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('administracion.crearplan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $request->validate([
                'anio' => 'required|numeric',
                'horas_totales' => 'required|numeric',
                'horas_teoricas' => 'required|numeric',
                'horas_practicas' => 'required|numeric',
                'DTE' => 'required|numeric',
                'RTF' => 'required|numeric',
                'creditos_academicos' => 'required|numeric',
                'area_tematica' => ['required', 'string', 'in:form_basica,form_aplicada,form_profesional'],
                'fundamentacion' => ['required', 'string', function ($attribute, $value, $fail) {

                    if (!is_string($value)) {
                        $fail('La fundamentación debe ser un texto.');
                        return;
                    }

                    // Contar las palabras en la fundamentación
                    $numeroPalabras = str_word_count($value);

                    // Establecer el límite de palabras (200)
                    $limitePalabras = 200;

                    // Validar el límite de palabras
                    if ($numeroPalabras > $limitePalabras) {
                        $fail("La fundamentación no puede tener más de $limitePalabras palabras.");
                    }
                }], 
                'cont_minimos' => 'required|string',
                'programa_analitico' => 'required|string',
                'act_practicas' => 'required|string',
                'modalidad' => 'required|string',
                'bibliografia' => 'required|string',
            ]);
            $planes = new Plan();
            $planes->anio = $request->get('anio');
            $planes->horas_totales = $request->get('horas_totales');
            $planes->horas_teoricas = $request->get('horas_teoricas');
            $planes->horas_practicas = $request->get('horas_practicass');
            $planes->DTE = $request->get('DTE');
            $planes->RTF = $request->get('RTF');
            $planes->creditos_academicos = $request->get('creditos_academicos');
            $planes->area_tematica = $request->get('area_tematica');
            $planes->fundamentacion = $request->get('fundamentacion');
            $planes->cont_minimos = $request->get('cont_minimos');
            $planes->programa_analitico = $request->get('programa_analitico');
            $planes->act_practicas = $request->get('act_practicas');
            $planes->modalidad = $request->get('modalidad');
            $planes->bibliografia = $request->get('bibliografia');

            $planes->save();
            return redirect('/administracion')->with('estado', 'Nuevo plan creado exitosamente.');
        }
        catch(\Exception $e){
            return redirect('/administracion')->with('warning', 'No se ha podido crear el plan.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}