<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    use HasFactory;
    public function materia()
    {
        return $this->belongsToMany(Materia::class);
    }

    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }
}
