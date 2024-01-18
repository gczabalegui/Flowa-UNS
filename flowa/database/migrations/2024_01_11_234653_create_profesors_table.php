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
            $table->unsignedInteger('legajo')->unique();
            $table->string('nombre');
            $table->string('apellido');
            $table->unsignedInteger('DNI')->unique();
            $table->string('email')->unique();

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
