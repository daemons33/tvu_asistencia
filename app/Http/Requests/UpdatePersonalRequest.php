<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePersonalRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'ci'=>'required|string',
            'nombre'=>'required|string',
            'paterno'=>'nullable|string',
            'materno'=>'nullable|string',
            'correo'=>'required|string|email',
            'celular'=>'required|string|max:30',
            'sexo'=>'required|string',
            'fechaini'=>'required|date',
            'fechafin'=>'required|date',
            'gestion'=>'required|string|max:4',
            'turno'=>'required|string',
            'carrera'=>'required',
            'area'=>'required',
            'relacion_laboral'=>'required',
            'status'=>'required|string'
        ];
    }
}
