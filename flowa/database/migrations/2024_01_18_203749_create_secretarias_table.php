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
        Schema::create('secretarias', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('nombre_secretaria');
            $table->string('apellido_secretaria');
            $table->unsignedInteger('DNI_secretaria')->unique();            
            $table->unsignedInteger('legajo_secretaria')->unique();
            $table->string('email_secretaria')->unique();

            $table->unsignedBigInteger('departamento_id');
            $table->foreign('departamento_id')->references('id')->on('departamentos');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('secretarias');
    }
};
