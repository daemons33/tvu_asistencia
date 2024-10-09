<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class carrera extends Model
{
    use HasFactory;
    protected $table = 'carreras'; 
    protected $fillable=['nombre_carrera'];

    protected function nombre_carrera():Attribute{
        return attribute::make(
            set: function ($value){
                return strtolower($value);
            }
        );
    }

    public function setNombreCarreraAttribute($value)
    {
        $this->attributes['nombre_carrera'] =  mb_strtoupper($value, 'UTF-8');
    }

    /*public function getNombreCarreraAttribute($value)
    {
        return mb_strtoupper($value, 'UTF-8');
    }*/
}
