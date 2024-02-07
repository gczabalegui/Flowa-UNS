<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Secretaria extends Model
{
    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }
}
