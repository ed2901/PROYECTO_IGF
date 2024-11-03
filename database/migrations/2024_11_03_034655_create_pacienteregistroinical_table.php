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
        Schema::create('pacientes_reg_inicial', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('genero');
            $table->integer('edad');
            $table->datetime('fecha');
            $table->text('sintomas');
            $table->unsignedBigInteger('registrante');
            $table->unsignedBigInteger('hospital');
            $table->text('estado');
            $table->timestamps();

            // Relación con el usuario (asumiendo que 'registrante' es un ID de usuario)
            $table->foreign('registrante')->references('id')->on('users')->onDelete('cascade');
            // Relación con el hospital
            $table->foreign('hospital')->references('id')->on('hospitales')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paciente_reg_inicial');
    }
};
