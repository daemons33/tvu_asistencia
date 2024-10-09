<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asistencias', function (Blueprint $table) {
            $table->id();
            $table->string('ci', 20)->index();
            $table->datetime('entrada')->nullable(); // Campo para la hora de entrada (puede ser nulo)
            $table->datetime('salida')->nullable(); // Campo para la hora de salida (puede ser nulo)
            $table->string('hora_dia', 30)->nullable(); // Campo para las horas trabajadas en el día
            //$table->date('fecha');
            $table->text('observaciones')->nullable();
            $table->timestamps();
            $table->foreign('ci')->references('ci')->on('personal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asistencias');
    }
};
