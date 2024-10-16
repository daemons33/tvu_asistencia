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
        DB::connection('mysql_pasante')->statement('CALL OMISION_MARCADO()');
        
        $asistencias = DB::connection('mysql_pasante')->table('asistencia')->get();
        foreach($asistencias as $control){
                $asistencia  = new Asistencia();
                $asistencia->ci = $control->cip;
                
                $entrada = Carbon::createFromFormat('d/m/Y H:i', $control->fecha_a . ' ' . $control->hora_entrada)
                        ->format('Y-m-d H:i:s');

                $salida = Carbon::createFromFormat('d/m/Y H:i', $control->fecha_a . ' ' . $control->hora_salida)
                        ->format('Y-m-d H:i:s');

                $asistencia->entrada = $entrada;
                $asistencia->salida = $salida;

                $asistencia->hora_dia = $control->hora_dia;
                $asistencia->observaciones = "";

                $asistencia->save();
        }
    }
}
