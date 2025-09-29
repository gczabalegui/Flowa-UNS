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
        'departamento_id'];
        
   public function materia()
    {
        return $this->hasMany(Materia::class);
    }

    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }

    public function comision()
    {
        return $this->hasOne(Comision::class);
    }

    public function profesor()
    {
        return $this->hasMany(Profesor::class);
    }
}

