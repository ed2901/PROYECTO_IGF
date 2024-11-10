<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTriagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('triages', function (Blueprint $table) {
            $table->id();
            $table->string('codigo'); // Código del triage
            $table->string('descripcion'); // Descripción del triage
            $table->integer('prioridad'); // Prioridad del triage
            $table->string('tiempo');
            $table->unsignedBigInteger('hospital');

            $table->timestamps();

            // Definir la clave foránea
            $table->foreign('hospital')->references('id')->on('hospitales')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('triages', function (Blueprint $table) {
            
        });

        Schema::dropIfExists('triages');
    }
}
