<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    use HasFactory;
    protected $table = 'carreras';
    protected $fillable = [
        'codigo_carrera', 
        'nombre_carrera',
        'plan_version',
        'duracion',
        'cant_materias',
        'departamento_codigo'];
        
    public function materia()
    {
        return $this->belongsToMany(Materia::class, 'carrera_materia');
    }

    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }

    public function comision()
    {
        return $this->hasOne(Comision::class);
    }
}

