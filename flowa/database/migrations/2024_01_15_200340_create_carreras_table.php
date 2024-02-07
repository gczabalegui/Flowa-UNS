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
        Schema::create('carreras', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedInteger('codigo_carrera');
            $table->string('nombre_carrera');
            $table->string('plan_version'); //ej: plan 1998-11
            $table->string('duracion'); //como String porque se mide en cuatrimestres. ej: 10 cuat.
            $table->unsignedInteger('cant_materias');
            $table->unsignedBigInteger('departamento_id');
            
            $table->foreign('departamento_id')->references('id')->on('departamentos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carreras');
    }
};
