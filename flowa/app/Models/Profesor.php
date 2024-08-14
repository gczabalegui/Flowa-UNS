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
        'apellido',
        'DNI',
        'email',
        'legajo',
    ];

    public function materia()
    {
        return $this->hasMany(Materia::class);
    }
}
