<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    use HasFactory;
    protected $table='asistencias';

    public function getEntradaAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('H:i d-m-Y');
    }

    public function getSalidaAttribute($value)
    {
        return $value ? \Carbon\Carbon::parse($value)->format('H:i d-m-Y') : null;
    }
}
