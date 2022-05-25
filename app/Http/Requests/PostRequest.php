<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'titulo' => [
                'required',
                'string',
                'max:30',
            ],
            'entrada' => [
                'required',
                'string',
            ],
            'contenidoPost' => [
                'required',
                'string'],
            'imagePost' => 'image',
        ];
    }

    public function messages()
    {
        return [
            /* Titulo */
            'titulo.required' => 'El Titulo del Post es obligatorio',
            'titulo.string' => 'El Titulo del Post debe ser un texto.',
            'titulo.max' => 'El Titulo del Post de no puede tener más de 30 carácteres.',

            /* entrada */
            'entrada.required' => 'Los Apellidos del Post es obligatorio',
            'entrada.string' => 'Los Apellidos del Post debe ser un texto.',

            /* contenidoPost */
            'contenidoPost.required' => 'El Contenido del Post es obligatorio',
            'contenidoPost.string' => 'El Contenido del Post debe ser un texto.',

            /* imagen */
            'imagePost.image' => 'Solo acepta formatos de imagen',
        ];
    }
}
