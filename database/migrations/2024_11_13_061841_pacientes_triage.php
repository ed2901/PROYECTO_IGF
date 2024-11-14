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
        Schema::create('pacientes_triage', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('paciente');
            $table->integer('temperatura');
            $table->string('antecedentes');
            $table->integer('frec_cardiaca');
            $table->string('observaciones');
            $table->integer('glicemia');
            $table->integer('glasgow');
            $table->unsignedBigInteger('triage');
            $table->timestamps();


            //relaciones
            $table->foreign('paciente')->references('id')->on('pacientes_reg_inicial')->onDelete('cascade');
            $table->foreign('triage')->references('id')->on('triages')->onDelete('cascade');

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacientes_triage');
    }
};
