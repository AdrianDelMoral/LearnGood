<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class PlatformRequest extends FormRequest
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
            // no tenga una longitud de más de 30
                'nombre' => [
                    'required',
                    'unique:platforms,nombre',
                    'string',
                    'max:30',
                    ],
                'platformURL' => [
                    'required',
                    'url'
                ],
    // solo podrá subir una imagen por plataforma y que sea de un maximo de 100kb de peso
                'platformImage' => [
                    'required',
                    'image',
                    'mimes:svg',
                    'dimensions:width=16,height=16'
                ]
            ];
    }

    public function messages(){
        return [
            /* Nombre */
            'nombre.required' => 'El nombre de la Plataforma es obligatorio',
            'nombre.unique' => 'Ya existe una Plataforma creada con este nombre.',
            'nombre.string' => 'El nombre de la Plataforma debe ser un texto.',
            'nombre.max' => 'El nombre de la Plataforma solo se permite 30 carácteres.',

            /* platformURL */
            'platformURL.required' => 'La URL de la Plataforma es obligatoria.',
            'platformURL.url' => 'Escribe una URL que exista.',

            /* platformImage */
            'platformImage.required' => 'La Imagen de la Plataforma es obligatoria.',
            'platformImage.image' => 'El archivo debe ser una imagen.',
            'platformImage.mimes' => 'Solo está permitido formato de imagen SVG.',
            'platformImage.dimensions' => 'El tamaño de la imagen debe ser 16x16.',
        ];
    }
}
