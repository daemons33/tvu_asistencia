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
        Schema::create('personal', function (Blueprint $table) {
            $table->id();
            $table->string('ci', 20)->unique();
            $table->string('nombre', 80);
            $table->string('paterno', 80)->nullable(); // DEFAULT NULL
            $table->string('materno', 80)->nullable(); // DEFAULT NULL
            $table->string('correo')->unique();
            $table->string('celular', 30);
            $table->string('sexo');
            $table->date('fechaini');
            $table->date('fechafin');
            $table->string('gestion');
            $table->string('turno');
            //$table->string('foto');
            $table->string('carrera');
            $table->string('area');
            $table->string('relacion_laboral');
            $table->string('status');

            // Foreign keys
            $table->foreign('carrera')->references('nombre_carrera')->on('carreras');
            $table->foreign('area')->references('nombre_area')->on('areas');
            $table->foreign('relacion_laboral')->references('relacion_laboral')->on('relacion_laborales');
    
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personal');
    }
};
