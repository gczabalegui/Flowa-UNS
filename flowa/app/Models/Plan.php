<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
    const AREA_TEMATICA = ['Formación básica', 'Formación aplicada', 'Formación profesional'];
    const ESTADO = ['Creado por Administración', 'Incompleto por Administración', 'Completo por Administración', 'Incompleto por Profesor', 'Completo por profesor', 'Incompleto por S.A.', 'Completo por S.A.', 'En revisión por S.A.', 'Aprobado por S.A.', 'Desaprobado por S.A.', 'Plan completo y aprobado'];
   
    public function materia()
    {
        return $this->belongsTo(Materia::class);
    }
}
