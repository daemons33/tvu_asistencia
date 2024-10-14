<?php

namespace Database\Seeders;

use App\Models\Personal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PersonalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $persona = new Personal();
        $persona->ci ='001';
        $persona->nombre= 'Marcelo';
        $persona->paterno = 'Ovando';
        $persona->materno='Colque';
        $persona->correo='marce@gmail.com';
        $persona->celular='777';
        $persona->sexo='HOMBRE';
        $persona->fechaini='2024-08-24';
        $persona->fechafin='2024-08-20';
        $persona->gestion='2024';
        $persona->turno='MAÑANA';
        $persona->carrera= 'INFORMATICA';
        $persona->area= 'PRENSA';
        $persona->relacion_laboral= 'PASANTE';
        $persona->status = 'ACTIVO';
        
        $persona->save();
        DB::connection('mysql_pasante')
        ->table('pasante')
        ->where('carrera', 'NINGUNO')  // Condición para seleccionar varios registros
        ->update(['carrera' => 'INFORMATICA']);


        //? TENEMOS DOS MANERAS, ELOQUENTS O CALL A FUNCIONES Y PROCEDIMIENTOS:
        //!CARRERA CON VALOR 'NINUGNO'
        //DB::connection('mysql_pasante')->statement('CALL CARRERA_NINGUNO()');
        
        $persona->save();
        DB::connection('mysql_pasante')
        ->table('pasante')
        ->where('carrera', 'NINGUNO')  // Condición para seleccionar varios registros
        ->update(['carrera' => 'INFORMATICA']);

        //!AREA CON VALOR 'NINUGNO'
        DB::connection('mysql_pasante')->statement('CALL AREA_NINGUNO()');

        /*$persona->save();
        DB::connection('mysql_pasante')
        ->table('pasante')
        ->where('carrera', 'NINGUNO')  // Condición para seleccionar varios registros
        ->update(['carrera' => 'INFORMATICA']);*/

        //!fechaini vacias, lo rellenamos, con la primera asistencia:
        DB::connection('mysql_pasante')->statement('CALL FECHAINI_VACIA()');

        //!fechafin vacias:
        DB::connection('mysql_pasante')->statement('CALL FECHAFIN_VACIA()');

        $pasantes = DB::connection('mysql_pasante')->table('pasante')->get();
        foreach ($pasantes as $pasante) {
            $personal = new Personal();
            $personal->ci = $pasante->ci;
            $personal->nombre = $pasante->nombre;
            $personal->paterno = $pasante->appaterno;
            $personal->materno = $pasante->apmaterno;
            $correo = $pasante->ci."@tvumsa.bo";
            $personal->correo = $correo;
            $personal->celular = $pasante->cel;
            $personal->sexo = "MUJER";
            $fechaInicio = Carbon::createFromFormat('d/m/Y', $pasante->fechaini)->toDateString();
            $personal->fechaini = $fechaInicio;
            $fechaFin = Carbon::createFromFormat('d/m/Y', $pasante->fechafin)->toDateString();
            $personal->fechafin = $fechaFin;
            $personal->gestion = $pasante->gestion;
            $personal->turno = $pasante->turno;
            //$personal->foto = "";
            $personal->carrera = $pasante->carrera;
            $personal->area = $pasante->area;
            $personal->relacion_laboral = $pasante->tcontrato;
            $personal->status = 'ACTIVO';
            $personal->save();
            //return $fechaConvertida;
        }
    }
}
