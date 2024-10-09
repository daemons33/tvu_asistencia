<?php

namespace Database\Seeders;

use App\Models\RelacionLaboral;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RelacionLaboralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $relacion_laboral = new RelacionLaboral();
        $relacion_laboral->relacion_laboral = 'PASANTE';
        $relacion_laboral->save();

        $relacion_laboral = new RelacionLaboral();
        $relacion_laboral->relacion_laboral = 'CONTRATO';
        $relacion_laboral->save();

        $relacion_laboral = new RelacionLaboral();
        $relacion_laboral->relacion_laboral = 'TRABAJO DIRIGIDO';
        $relacion_laboral->save();

        /*$relacion_laboral = new RelacionLaboral();
        $relacion_laboral->relacion_laboral = 'pasante';
        $relacion_laboral->save();*/

    }
}
