<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comision extends Model
{
    use HasFactory;
    protected $table = 'comisions'; 
    
    protected $fillable = [
       'nombre_comision',
        'apellido',
        'DNI',
        'legajo',
        'email',
        'carrera_responsable',
    ];


    public function carrera()
    {
        return $this->belongsTo(Carrera::class);
    }
}
