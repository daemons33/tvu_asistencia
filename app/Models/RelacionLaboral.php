<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RelacionLaboral extends Model
{
    use HasFactory;

    protected $table = 'relacion_laborales';
    protected $fillable = ['relacion_laboral'];

    public function setRelacionLaboralAttribute($value)
    {
        $this->attributes['relacion_laboral'] =  mb_strtoupper($value, 'UTF-8');;
    }

    /*public function getRelacionLaboralAttribute($value)
    {
        return mb_strtoupper($value, 'UTF-8');
    }*/
}
