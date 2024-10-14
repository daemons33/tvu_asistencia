<?php

namespace Database\Seeders;

use App\Models\Asistencia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AsistenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $asistencias = DB::connection('mysql_pasante')->table('asistencia')->get();
        foreach($asistencias as $control){
            $asistencia  = new Asistencia();
            $asistencia->ci = $control->cip;

            $fechaEntrada = Carbon::createFromFormat('Y-m-d', $control->fecha_a)
            ->setTimeFromTimeString($control->hora_entrada);

            $fechaSalida = Carbon::createFromFormat('Y-m-d', $control->fecha_a)
            ->setTimeFromTimeString($control->hora_salida);

            $asistencia->entrada = $fechaEntrada;
            $asistencia->salida = $fechaSalida;
            $asistencia->hora_dia = $control->hora_dia;
            $asistencia->observaciones = "";
        }
    }
}
