<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LibroFormRequest extends FormRequest
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
            'titulo' => 'required',
            'autor' => 'required',
            'editorial' => 'required',
            'ano' => 'required'
        ];
    }

    public function messages(){
        return [
            'titulo.required' => 'El titulo es obligatorio',
            'autor.required' => 'El autor es obligatorio',
            'editorial.required' => 'La editorial es obligatoria',
            'ano.required' => 'El año es obligatorio'
        ];
    }
}
