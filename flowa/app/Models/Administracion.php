<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administracion extends Model
{
    use HasFactory;
    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }
    public function materia()
    {
        return $this->hasMany(Materia::class);
    }
}
