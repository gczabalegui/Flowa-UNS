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
        Schema::create('materia_correlativas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('materia_id');
            $table->unsignedBigInteger('correlativa_id');
            $table->enum('tipo_correlativa', ['fuerte', 'debil']);
            $table->timestamps();
            $table->foreign('materia_id')->references('id')->on('materias')->onDelete('cascade');
            $table->foreign('correlativa_id')->references('id')->on('materias')->onDelete('cascade');
            $table->unique(['materia_id', 'correlativa_id', 'tipo_correlativa'], 'materia_correlativa_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materia_correlativas');
    }
};
