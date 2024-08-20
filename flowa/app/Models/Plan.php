<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
    const AREA_TEMATICA = ['Formación básica', 'Formación aplicada', 'Formación profesional'];
    protected $fillable = [                
        'materia_id',
        'anio',
        'horas_totales',
        'horas_teoricas',
        'horas_practicas',
        'DTE',
        'RTF',
        'creditos_academicos',
        'area_tematica',
        'fundamentación',
        'obj_conceptuales',
        'obj_procedimeentales',
        'obj_actitudinales',
        'obj_especificos',
        'cont_minimos',
        'programa analitico',
        'act_practicas',
        'modalidad',
        'bibliografia'
    ];
    public function materia()
    {
        return $this->belongsTo(Materia::class, 'materia_id');
    }
}
