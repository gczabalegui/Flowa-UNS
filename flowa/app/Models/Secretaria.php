<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Secretaria extends Model
{
    use HasFactory;
    protected $table = 'secretarias'; 
    
    protected $fillable = [
       'nombre_secretaria',
        'apellido_secretaria',
        'DNI_secretaria',
        'legajo_secretaria',
        'email_secretaria',
    ];
    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }
}
