<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;
    protected $table = 'materias'; 
    protected $fillable = [
        'nombre_materia',
        'codigo_materia',
        'codigo',
        'horas_semanales',
        'horas_totales',
        'profesor_id',
        'carrera_id',
        /*'administracion_id',*/
    ];
    
    public function profesor()
    {
        return $this->belongsTo(Profesor::class, 'profesor_id');
    }

    public function carrera()
    {
        return $this->belongsToMany(Carrera::class, 'carrera_materia');
    }

    /*public function administracion()
    {
        return $this->belongsTo(Administracion::class);
    }*/
    public function plan()
    {
        return $this->hasMany(Plan::class);
    }

    public function correlativasFuertes()
    {
        return $this->belongsToMany(Materia::class, 'materia_correlativas', 'materia_id', 'correlativa_id')
                    ->wherePivot('tipo_correlativa', 'fuerte')
                    ->withTimestamps();
    }

    public function correlativasDebiles()
    {
        return $this->belongsToMany(Materia::class, 'materia_correlativas', 'materia_id', 'correlativa_id')
                    ->wherePivot('tipo_correlativa', 'debil')
                    ->withTimestamps();
    }

    // Materias que requieren esta como correlativa fuerte
    public function requierenComoFuerte()
    {
        return $this->belongsToMany(Materia::class, 'materia_correlativas', 'correlativa_id', 'materia_id')
                    ->wherePivot('tipo_correlativa', 'fuerte')
                    ->withTimestamps();
    }

    // Materias que requieren esta como correlativa débil
    public function requierenComoDebil()
    {
        return $this->belongsToMany(Materia::class, 'materia_correlativas', 'correlativa_id', 'materia_id')
                    ->wherePivot('tipo_correlativa', 'debil')
                    ->withTimestamps();
    }
}
