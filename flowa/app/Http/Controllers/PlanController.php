<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\Materia;
use Exception;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $planes = Plan::with(['materia.profesor'])->get();
        return view('administracion.verplanes', compact('planes'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        try{
            $materias = Materia::with('profesor')->orderBy("nombre_materia")->get();

            if($materias->isEmpty()){
                return redirect('/administracion')->with('warning','No hay materias creadas. Por favor, cree una materia antes de crear un plan de materia.');    
            }

            return view('administracion.crearplan')->with('materias', $materias);
        }
        catch(Exception $e){
            dd($e);
            return redirect()->back()->with('error', $e->getMessage());
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    //crear una funcion store que lo haga para un store de borrador, sin el required
    public function storeByAdmin(Request $request)
    {
        try{
            $request->validate([                
                'materia_id'=> 'required|numeric|exists:materias,id',
                'anio' => 'required|numeric',
                'horas_totales' => 'required|numeric',
                'horas_teoricas' => 'required|numeric',
                'horas_practicas' => 'required|numeric',
                'DTE' => 'required|numeric',
                'RTF' => 'required|numeric',
                'creditos_academicos' => 'required|numeric',
            ]);

            $planes = new Plan();
            $planes->estado = 'Completo por administración.';
            $planes->fill($request->only([
                'materia_id',
                'anio',
                'horas_totales',
                'horas_teoricas',
                'horas_practicas',
                'DTE',
                'RTF',
                'creditos_academicos'
            ]));
            $planes->area_tematica = null;
            $planes->fundamentacion = '';
            $planes->obj_conceptuales = '';
            $planes->obj_procedimeentales = '';
            $planes->obj_actitudinales = '';
            $planes->obj_especificos = '';
            $planes->cont_minimos = '';
            $planes->programa_analitico = '';
            $planes->act_practicas = '';
            $planes->modalidad = '';
            $planes->bibliografia = '';

            $planes->save();
            return redirect('/administracion')->with('estado', 'Nuevo plan creado exitosamente.');
        }
        catch(\Exception $e){
            dd($e);
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