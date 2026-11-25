<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('carreras', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique();
            $table->timestamps();
        });

        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('codigo')->unique();
            $table->unsignedTinyInteger('creditos');
            $table->foreignId('carrera_id')
                ->constrained()
                ->restrictOnDelete();
            $table->timestamps();
        });

        Schema::create('matriculas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_estudiante');
            $table->string('correo_estudiante');
            $table->foreignId('curso_id')
                ->constrained()
                ->restrictOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('matriculas');
        Schema::dropIfExists('cursos');
        Schema::dropIfExists('carreras');
    }
};