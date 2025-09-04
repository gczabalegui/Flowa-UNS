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
        Schema::create('materias', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('nombre_materia')->unique();
            $table->unsignedInteger('codigo_materia')->unique();
            $table->unsignedInteger('horas_semanales');
            $table->unsignedInteger('horas_totales');
            
            $table->unsignedBigInteger('profesor_id');        
            $table->foreign('profesor_id')->references('id')->on('profesors')->onDelete('cascade');

            $table->unsignedBigInteger('carrera_id');
            $table->foreign('carrera_id')->references('id')->on('carreras')->onDelete('cascade'); 

           /* $table->unsignedBigInteger('administracion_id');
            $table->foreign('administracion_id')->references('id')->on('administracions')->onDelete('cascade');*/
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materias');
    }
};
