<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;
    protected $table = ' materias'; 
    protected $fillable = [
        'nombre_materia',
        'codigo',
        'horas_semanales',
        'horas_totales',
        'profesor_id',
        'carrera_id',
        'administracion_id',
    ];
    
    public function profesor()
    {
        return $this->belongsTo(Profesor::class);
    }

    public function carrera()
    {
        return $this->belongsToMany(Carrera::class);
    }

    public function administracion()
    {
        return $this->belongsTo(Administracion::class);
    }
    public function plan()
    {
        return $this->hasMany(Plan::class);
    }
}
