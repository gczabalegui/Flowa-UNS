<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    use HasFactory;
    protected $table = 'profesors'; 
    
    protected $fillable = [
        'nombre_profesor',
        'apellido_profesor',
        'DNI_profesor',
        'email_profesor',
        'legajo_profesor',
        'carrera_id',
        'contraseña_profesor',
    ];

    
    public function materia()
    {
        return $this->hasMany(Materia::class);
    }
        
    public function carrera()
    {
        return $this->belongsTo(Carrera::class);
    }
}
