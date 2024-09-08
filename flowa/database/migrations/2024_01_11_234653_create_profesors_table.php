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
        Schema::create('profesors', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('nombre_profesor');
            $table->string('apellido_profesor');     
            $table->unsignedInteger('DNI_profesor')->unique();
            $table->string('email_profesor')->unique();            
            $table->unsignedInteger('legajo_profesor')->unique();
            $table->string('contraseña_profesor');

            $table->unsignedBigInteger('carrera_id')->nullable(); //TODO
            $table->foreign('carrera_id')->references('id')->on('carreras')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profesors');
    }
};
