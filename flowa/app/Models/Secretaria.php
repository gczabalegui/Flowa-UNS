<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Secretaria extends Model
{
    use HasFactory;
    protected $table = 'secretarias'; 
    
    protected $fillable = [
        'DNI',
        'apellido',
        'departamento_id',
        'email',
        'legajo',
        'nombre', 
        'nombre_secretaria',
    ];
    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }
}
