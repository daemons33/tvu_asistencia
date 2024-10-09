<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Personal extends Model
{
    protected $table = 'personal';
    use HasFactory;
    protected $fillable=[
        'ci',
        'nombre',
        'paterno',
        'materno',
        'correo',
        'sexo',
        'celular',
        'fechaini',
        'fechafin',
        'gestion',
        'turno',
        'carrera',
        'area',
        'relacion_laboral',
        'status',
    ];

    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] =  mb_strtoupper($value, 'UTF-8');
    }

    /*public function getNombreAttribute($value)
    {
        return mb_strtoupper($value, 'UTF-8');
    }*/

    public function setPaternoAttribute($value)
    {
        $this->attributes['paterno'] =  mb_strtoupper($value, 'UTF-8');
    }

    /*public function getPaternoAttribute($value)
    {
        return mb_strtoupper($value, 'UTF-8');
    }*/

    public function setMaternoAttribute($value)
    {
        $this->attributes['materno'] =  mb_strtoupper($value, 'UTF-8');
    }

    /*public function getMaternoAttribute($value)
    {
        return mb_strtoupper($value, 'UTF-8');
    }
    */
    public function getFechainiAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }
    public function getFechafinAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }
}
