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
        Schema::create('departamentos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedInteger('codigo_departamento');
            $table->string('nombre_departamento');
            $table->string('calle_departamento');
            $table->unsignedInteger('numero_departamento');
            $table->string('sitio_web_departamento');

           /* $table->unsignedBigInteger('secretaria_id')->nullable();*/
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departamentos');
    }
};
