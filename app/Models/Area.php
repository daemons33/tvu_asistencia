<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;
    protected $table = 'areas';
    protected $fillable = ['nombre_area'];
    
    protected function nombre_area():Attribute{
        return attribute::make(
            set: function ($value){
                return strtolower($value);
            }
        );
    }

    public function setNombreAreaAttribute($value)
    {
        $this->attributes['nombre_area'] =  mb_strtoupper($value, 'UTF-8');
    }
/*
    public function getNombreAreaAttribute($value)
    {
        return mb_strtoupper($value, 'UTF-8');
    }*/
}
