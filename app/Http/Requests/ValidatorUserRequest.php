<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidatorUserRequest extends FormRequest
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
            'name' => 'required',
            'email' => ['required','email'],
            'role' => 'required',
            'password' => ['required', 'min:8'],
        ];
    }
    public function messages(){
        return [
            'name.required' => 'El nombre es requerido.',
            'email.required' => 'El correo es requerido.',
            'email.email' => 'El campo debe ser un correo electronico.',
            'role.required' => 'El tipo de usuario es requerido.',
            'password.required' => 'La contraseña es requerida',
            'password.min' => 'La contraseña debe tener minimo 8 caracteres.',
        ];
    }
}
