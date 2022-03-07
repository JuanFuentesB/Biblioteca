<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistroFormRequest extends FormRequest
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
            'nombre' => 'required',
            'email' => 'required | email | unique:usuarios',
            'password' => 'required | confirmed'
        ];
    }

    public function messages(){
        return [
            'nombre' => 'El nombre es obligatorio',
            'email.required' => 'El correo es obligatorio',
            'email.email' => 'formato de correo incorrecto',
            'email.unique' => 'El correo ya esta registrado',
            'password.required' => 'El password es obligatorio',
            'password.confirmed' => 'El pasword no es el mismo'
        ];
    }
}
