<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LevelRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'nombre' => [
                'required',
                'string',
                'max:20'
            ],
        ];
    }

    public function messages()
    {
        return [
            /* Nombre */
            'nombre.required' => 'El Nombre de la Asignatura es obligatorio',
            'nombre.string' => 'El Nombre de la Asignatura debe ser un texto.',
            'nombre.max' => 'El Nombre de la Asignatura de no puede tener más de 20 carácteres.',
        ];
    }
}
