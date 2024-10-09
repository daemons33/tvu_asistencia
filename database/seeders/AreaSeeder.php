<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $area = new Area();
        $area->nombre_area = 'PRENSA';
        $area->save();

        $area = new Area();
        $area->nombre_area = 'ESTUDIO';
        $area->save();

        $area = new Area();
        $area->nombre_area = 'PRODUCCION';
        $area->save();

        $area = new Area();
        $area->nombre_area = 'RADIO';
        $area->save();
    }
}
