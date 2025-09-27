<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\Materia;
use App\Models\Profesor;
use Exception;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Validation\Rule;


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
        // Obtener el usuario autenticado
        $user = Auth::user();

        // Obtener el profesor asociado al usuario mediante el legajo
        $profesor = Profesor::where('legajo_profesor', $user->legajo)->first();

        // Obtener los planes asociados al profesor
        $planes = Plan::with(['materia.profesor'])
            ->whereHas('materia', function ($query) use ($profesor) {
                $query->where('profesor_id', $profesor->id);
            })
            ->where(function ($query) {
                $query->where('estado', 'Completo por administración.')
                    ->orWhere('estado', 'Rechazado por secretaría académica.');
            })
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

    public function indexComision()
    {
        $planes = Plan::with(['materia.profesor'])
            ->where('estado', 'Aprobado por secretaría académica.')
            ->get();
        return view('comision.verplanes', compact('planes'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $materias = Materia::with('profesor')->orderBy("nombre_materia")->get();

            if ($materias->isEmpty()) {
                return redirect('/administracion')->with('warning', 'No hay materias creadas. Por favor, cree una materia antes de crear un plan de materia.');
            }

            $currentYear = date('Y');
            $inicialYear = 1990;
            $years = range($inicialYear, $currentYear);
            return view('administracion.crearplan', compact('materias', 'years'));
        } catch (Exception $e) {
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
        try {
            $request->validate([
                'materia_id' => 'required|numeric|exists:materias,id',
            ]);

            $planes = new Plan();
            $planes->materia_id = $request->input('materia_id');

            if ($request->input('action') == 'guardar_borrador') {

                $planes->estado = 'Incompleto por administración.';
            } else if ($request->input('action') == 'guardar') {
                $planes->estado = 'Completo por administración.';

                $request->validate([
                    'anio' => 'required|numeric',
                    'horas_totales' => 'required|numeric',
                    'horas_teoricas' => 'required|numeric',
                    'horas_practicas' => 'required|numeric',
                    'DTE' => 'required|numeric',
                    'RTF' => 'required|numeric',
                    'creditos_academicos' => 'required|numeric'
                ]);
            }
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

            $planes->save();
            /*
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
    */
            if ($request->input('action') == 'guardar_borrador') {
                return redirect('/administracion')->with('estado', 'Nuevo plan guardado como borrador.');
            } else if ($request->input('action') == 'guardar') {
                return redirect('/administracion')->with('estado', 'Nuevo plan guardado exitosamente.');
            }
        } catch (\Exception $e) {
            dd($e);
            return redirect('/administracion')->with('warning', 'No se ha podido crear el plan.');
        }
    }

    public function storeByProfesor(Request $request, string $id)
    {
        try {
            // Buscar el plan por su ID
            $plan = Plan::find($id);

            if ($request->input('action') == 'rechazar') {
                $plan->estado = 'Rechazado para administración por profesor.';
                $validatedData = $request->validate([
                    'area_tematica' => 'nullable|in:Formación básica,Formación académica,Formación profesional',
                    'fundamentacion' => [
                        'required',
                        'string',
                        function ($attribute, $value, $fail) {
                            $this->validateFundamentacion($attribute, $value, $fail);
                        },
                    ],
                    'obj_conceptuales' => 'nullable|string',
                    'obj_procedimentales' => 'nullable|string',
                    'obj_actitudinales' => 'nullable|string',
                    'obj_especificos' => 'nullable|string',
                    'cont_minimos' => 'nullable|string',
                    'programa_analitico' => 'nullable|string',
                    'act_practicas' => 'nullable|string',
                    'modalidad' => 'nullable|string|max:100',
                    'bibliografia' => 'nullable|string',
                ]);
            } else if ($request->input('action') == 'guardar') {

                $plan->estado = 'Completo por profesor.';
                $validatedData = $request->validate([
                    'area_tematica' => 'required|in:Formación básica,Formación académica,Formación profesional',
                    'fundamentacion' => [
                        'required',
                        'string',
                        function ($attribute, $value, $fail) {
                            $this->validateFundamentacion($attribute, $value, $fail);
                        },
                    ],
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

            }
            $plan->fill($validatedData);
            $plan->save();

            return redirect('/profesor')->with('estado', 'El plan ha sido actualizado exitosamente.');
        } catch (\Exception $e) {
            dd($e);
            return redirect('/profesor')->with('warning', 'No se ha podido actualizar el plan.');
        }
    }

    private function validateFundamentacion($attribute, $value, $fail)
    {
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
    }

    public function bringPlanForm($id, $mode)
    {
        $plan = Plan::findOrFail($id);
        if ($mode === 'completar') {
            return view('profesor.completarinfoplan', compact('plan'));
        } elseif ($mode === 'modificar') {
            return view('profesor.modificarinfoplan', compact('plan'));
        } else {
            abort(404);
        }
    }

    public function bringInfoPlan($id, $role)
    {
        $plan = Plan::findOrFail($id);
        if ($role === 'secretaria') {
            return view('secretaria.traerinfoplan', compact('plan'));
        } elseif ($role === 'administracion') {
            return view('administracion.traerinfoplan', compact('plan'));
        } elseif ($role === 'profesor') {
            return view('profesor.traerinfoplan', compact('plan'));
        } elseif ($role === 'comision') {
            return view('comision.traerinfoplan', compact('plan'));
        } else {
            abort(404);
        }
    }

    public function aprobarPlan($id)
    {
        try {
            $plan = Plan::find($id);
            if ($plan) {
                $plan->estado = 'Aprobado por secretaría académica.';
                $plan->save();
                return redirect('/secretaria')->with('estado', 'Plan aprobado.');
            } else {
                return redirect('/secretaria')->with('warning', 'No se ha encontrado el plan.');
            }
        } catch (Exception $e) {
            dd($e);
            return redirect('/secretaria')->with('warning', 'No se ha podido procesar el nuevo estado del plan.');
        }
    }
    
    public function rechazarPlan(Request $request, $id)
    {
        try {
            $plan = Plan::find($id);
            if ($plan) {
                $role = $request->input('role');
                $type = $request->input('type');
    
                if ($role == 'secretaria') {
                    if ($type == 'administracion') {
                        $plan->estado = 'Rechazado para administración por secretaría académica.';
                        $plan->save();
                        return redirect('/secretaria')->with('estado', 'Plan rechazado para administración.');
                    } elseif ($type == 'profesor') {
                        $plan->estado = 'Rechazado para profesor por secretaría académica.';
                        $plan->save();
                        return redirect('/secretaria')->with('estado', 'Plan rechazado para profesor.');
                    }
                }
                // Puedes agregar aquí otros roles si lo necesitas
            }
            return redirect('/secretaria')->with('warning', 'No se ha encontrado el plan.');
        } catch (Exception $e) {
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
    public function updateByProfesor(Request $request, $id)
    {
        try {
            $plan = Plan::find($id);
            $plan->fill($request->all());
            $plan->update();

            return redirect('/profesor')->with('success', 'Información del plan actualizada correctamente.');
        } catch (\Exception $e) {
            dd($e);
            return redirect('/profesor')->with('error', 'Ocurrió un error al actualizar la información del plan.');
        }
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



    ////////////////////////PRUEBAS//////////////////////////
    public function exportarPDF($id)
    {
        $plan = Plan::findOrFail($id);
        $materia = $plan->materia;

        $pdf = Pdf::loadView('pdf.plan', compact('plan', 'materia'));
        return $pdf->download('plan_' . $materia->nombre_materia . '.pdf');
    }

    public function previewPDF(Request $request)
    {
        // tomamos los datos del form sin guardar
        $data = $request->all();

        // armamos un "Plan" en memoria (no se guarda en DB)
        $plan = new Plan($data);

        // obtenemos la materia y su profesor
        $materia = Materia::with('profesor')->findOrFail($data['materia_id']);

        // renderizamos la misma plantilla del PDF
        $pdf = Pdf::loadView('pdf.plan', compact('plan', 'materia'));

        // lo mostramos en el navegador
        return $pdf->stream('plan_preview.pdf');
    }

    /* 
public function exportarDocx($id)
{
    $plan = Plan::with('materia.profesor')->findOrFail($id);

    // Cargamos la plantilla
    $template = new TemplateProcessor(storage_path('app/plantillas/plan.docx'));

    // Reemplazamos variables
    $template->setValue('nombre_materia', $plan->materia->nombre_materia);
    $template->setValue('codigo', $plan->codigo);
    $template->setValue('anio_cursado', $plan->anio);
    $template->setValue('profesor', $plan->materia->profesor->apellido_profesor . ', ' . $plan->materia->profesor->nombre_profesor);
    $template->setValue('horas_totales', $plan->horas_totales);
    $template->setValue('fundamentacion', $plan->fundamentacion);
    // … y así con todos los campos que necesites

    // Guardamos un nuevo archivo
    $fileName = 'plan_'.$plan->materia->nombre_materia.'.docx';
    $path = storage_path("app/public/$fileName");

    $template->saveAs($path);

    return response()->download($path)->deleteFileAfterSend(true);
}*/
}
