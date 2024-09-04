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
        Schema::create('administracions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('nombre_administrativo')->default('admin');
            $table->string('nombre');
            $table->string('apellido');
            $table->unsignedInteger('DNI')->unique();
            $table->unsignedInteger('legajo')->unique();
            $table->string('email')->unique();
            $table->string('contraseña');

            $table->unsignedBigInteger('departamento_id')->nullable();
            $table->foreign('departamento_id')->references('id')->on('departamentos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('administracions');
    }
};
