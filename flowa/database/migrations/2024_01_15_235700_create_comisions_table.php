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
        Schema::create('comisions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('nombre_comision');
            $table->unsignedInteger('legajo')->unique();
            $table->string('nombre');
            $table->string('apellido');
            $table->unsignedInteger('DNI')->unique();
            $table->string('email')->unique();
            $table->string('carrera_responsable');

            $table->unsignedBigInteger('carrera_id')->unique();
            $table->foreign('carrera_id')->references('id')->on('carreras')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comisions');
    }
};
