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
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('estado')->nullable();;
            $table->unsignedBigInteger('materia_id');
            $table->foreign('materia_id')->references('id')->on('materias')->onDelete('cascade');
            //Con la materia, podríamos conseguir el código de materia y el departamento al que pertenece (datos que van en el plan)

            //RECUADRO
            $table->unsignedInteger('anio')->nullable();; 
            //Con la materia, podríamos conseguir quien es el profesor (dato que va en el plan)
            //Carga horaria:
            $table->unsignedInteger('horas_totales')->nullable();;
            $table->unsignedInteger('horas_teoricas')->nullable();;
            $table->unsignedInteger('horas_practicas')->nullable();;

            $table->unsignedInteger('DTE')->nullable();;
            $table->unsignedInteger('RTF')->nullable();;
            $table->unsignedInteger('creditos_academicos')->nullable();;

            $table->enum('area_tematica', ['Formación básica', 'Formación aplicada', 'Formación profesional'])->nullable();

            /*
            Aprobadas y desaprobadas creo que sería un combo box y cuando trae la materia, también trae el código. 
            */
            

            //CUERPO    
            /*
            Cuerpo docente creo que también sería un combo box con todos los docentes pero ademas de alguna forma
            habría que poder escribir la formación de grado, cargo y dedicación de cada uno de los docentes del cuerpo. 
            */

            $table->text('fundamentacion')->nullable();; 
            
            //Objetivos: 
                //Generales
                $table->text('obj_conceptuales')->nullable();; 
                $table->text('obj_procedimentales')->nullable();; 
                $table->text('obj_actitudinales')->nullable();; 
            $table->text('obj_especificos')->nullable();; 

            //Contenidos
            $table->text('cont_minimos')->nullable();; 
            $table->text('programa_analitico')->nullable();; 
            $table->text('act_practicas')->nullable();; 

            //Modalidad de enseñanza - aprendizaje
            $table->text('modalidad')->nullable();; 

            //Bibliografia
            $table->text('bibliografia')->nullable();; 

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plans');
    }
};
