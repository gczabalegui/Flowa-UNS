<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;

    protected $table = 'departamentos'; 
    
    protected $fillable = [
        'codigo_departamento', 
        'nombre_departamento', 
        'calle_departamento', 
        'numero_departamento', 
        'sitio_web_departamento'
    ];

    public function carrera()
    {
        return $this->hasMany(Carrera::class);
    }
    /*public function administracion()
    {
        return $this->hasMany(Administracion::class);
    }

    public function secretaria()
    {
        return $this->hasOne(Secretaria::class);
    }*/
}
