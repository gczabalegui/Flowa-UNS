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
    public function indexAdmin()
    {
        $planes = Plan::with(['materia.profesor'])->get();
        return view('administracion.verplanes', compact('planes'));
    }

    public function indexProfesor()
    {
        $planes = Plan::with(['materia.profesor']) 
                        ->where('estado', 'Completo por administración.') 
                        ->get();
        return view('profesor.verplanes', compact('planes'));
    }
    
    public function indexSecretaria()
    {
        $planes = Plan::with(['materia.profesor']) 
                        ->where('estado', 'Completo por profesor.') 
                        ->get();
        return view('secretaria.verplanes', compact('planes'));
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
            $planes->obj_procedimentales = '';
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

    public function storeByProfesor(Request $request, string $id)
    {
        try {
            // Buscar el plan por su ID
            $plan = Plan::findOrFail($id);

            // Validar los datos del request
            $validatedData = $request->validate([
                'area_tematica' => 'required|in:Formación básica,Formación académica,Formación profesional',
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
                'obj_conceptuales' => 'required|string',
                'obj_procedimentales' => 'required|string',
                'obj_actitudinales' => 'required|string',
                'obj_especificos' => 'required|string',
                'cont_minimos' => 'required|string',
                'programa_analitico' => 'required|string',
                'act_practicas' => 'required|string',
                'modalidad' => 'required|string|max:100',
                'bibliografia' => 'required|string',

            ]);

            // Actualizar los campos del plan con los nuevos datos
            $plan->fill($validatedData);
            $plan->estado = 'Completo por profesor.';

            $plan->save();

            return redirect('/profesor')->with('estado', 'El plan ha sido actualizado exitosamente.');
        } catch (\Exception $e) {
            dd($e);
            return redirect('/profesor')->with('warning', 'No se ha podido actualizar el plan.');
        }
    }

    public function bringPlanForm($id)
    {
        $plan = Plan::findOrFail($id);
        return view('profesor.completarinfoplan', compact('plan'));
    }

    public function bringInfoPlan($id, $role)
    {
        $plan = Plan::findOrFail($id);
        if ($role === 'secretaria') {
            return view('secretaria.traerinfoplan', compact('plan'));
        } elseif ($role === 'administracion') {
            return view('administracion.traerinfoplan', compact('plan'));
        } else {
            abort(404); 
        }
    }    
    
    public function aprobarPlan($id)
    {
        try{    
            $plan = Plan::find($id);
            if($plan){
                $plan->estado = 'Aprobado por Secretaría Académica';
                $plan->save();
                return redirect('/secretaria')->with('estado', 'Plan aprobado.');
            }
            else{
                return redirect('/secretaria')->with('warning', 'No se ha encontrado el plan.');
            } 
        }
        catch(Exception $e){
            dd($e);
            return redirect('/secretaria')->with('warning', 'No se ha podido procesar el nuevo estado del plan.');
        }
    }

    public function rechazarPlan($id)
    {
        try{    
            $plan = Plan::find($id);
            if($plan){
                $plan->estado = 'Rechazado por Secretaría Académica';
                $plan->save();
                return redirect('/secretaria')->with('estado', 'Plan rechazado.');
            }
            else{
                return redirect('/secretaria')->with('warning', 'No se ha encontrado el plan.');
            } 
        }
        catch(Exception $e){
            dd($e);
            return redirect('/secretaria')->with('warning', 'No se ha podido procesar el nuevo estado del plan.');
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
    public function editByProfesor(string $id)
    {
        $plan = Plan::find($id);
        return view('profesor.completarinfoplan', compact('plan'));

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