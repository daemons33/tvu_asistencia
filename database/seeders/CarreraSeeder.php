<?php

namespace Database\Seeders;

use App\Models\carrera;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarreraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $carrera = new carrera();
        $carrera->nombre_carrera="INFORMATICA";
        $carrera->save();

        $carrera = new carrera();
        $carrera->nombre_carrera="COMUNICACION";
        $carrera->save();

        $carrera = new carrera();
        $carrera->nombre_carrera="TECNICA";
        $carrera->save();

        $carrera = new carrera();
        $carrera->nombre_carrera="TELECOMUNICACIONES";
        $carrera->save();

        $carrera = new carrera();
        $carrera->nombre_carrera="ARTES PLASTICAS Y DISEÑO GRAFICO";
        $carrera->save();
    }
}
