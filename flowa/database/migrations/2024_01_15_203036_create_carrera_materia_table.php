<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('carrera_materia', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('carrera_id');
            $table->unsignedBigInteger('materia_id');
    
            $table->foreign('carrera_id')->references('id')->on('carreras')->onDelete('cascade');
            $table->foreign('materia_id')->references('id')->on('materias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carrera_materia');
    }
};

/* Obtener todas las materias de una carrera
$carrera = Carrera::find(1); // Supongamos que la carrera con ID 1 existe
$materias = $carrera->materias;

// Obtener todas las carreras de una materia
$materia = Materia::find(1); // Supongamos que la materia con ID 1 existe
$carreras = $materia->carreras;

*/
