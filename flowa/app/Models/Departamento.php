<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;
    public function carrera()
    {
        return $this->hasMany(Carrera::class);
    }
    public function administracion()
    {
        return $this->hasMany(Administracion::class);
    }

    public function secretaria()
    {
        return $this->hasOne(Secretaria::class);
    }
}
