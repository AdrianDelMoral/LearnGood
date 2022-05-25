<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserManageRequest extends FormRequest
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
                'required','string'
            ],
            'apellidos' => [
                'required',
                'string'
            ],
            'idioma' => [
                'required',
                'string'
            ],
            'descripcion' => [
                'required',
                'string',
                'max:150'
            ],
        ];
    }

    public function messages()
    {
        return [
            /* Nombre */
            'nombre.required' => 'El Nombre del Usuario es obligatorio',
            'nombre.string' => 'El Nombre del Usuario debe ser un texto.',

            /* apellidos */
            'apellidos.required' => 'Los Apellidos del Usuario son obligatorios.',
            'apellidos.string' => 'Los Apellidos del Usuario son debe ser un texto.',


            /* idioma */
            'idioma.required' => 'El idioma del Usuario es obligatoria.',
            'idioma.string' => 'El idioma del Usuario debe ser texto.',

            /* descripcion */
            'descripcion.required' => 'La Descripción de la Plataforma es obligatoria.',
            'descripcion.string' => 'La Descripción  debe ser una imagen.',
            'descripcion.max' => 'La Descripción no puede tener más de 150 carácteres.',
        ];
    }
}
