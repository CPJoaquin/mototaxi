<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidatorLocationRequest extends FormRequest
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
            'primary' => ['required', 'min:5', 'max:50'],
            'secondary' => ['required', 'min:5', 'max:100'],
            'description' => ['required', 'min:10', 'max:150'],
            'time' => ['required'],
        ];
    }
    public function messages(){
        return [
            'primary.required' => 'La calle principal es necesaria.',
            'primary.min' => 'El campo deve constar de al menos 5 caracteres.',
            'primary.max' => 'El campo debe ser de maximo 50 caracteres.',
            'secondary.required' => 'La calle secundaria es necesaria.',
            'secondary.min' => 'El campo deve constar de al menos 10 caracteres.',
            'secondary.max' => 'El campo debe ser de maximo 100 caracteres.',
            'description.required' => 'La descripción es necesaria.',
            'description.min' => 'El campo deve constar de al menos 10 caracteres.',
            'description.max' => 'El campo debe ser de maximo 150 caracteres.',
            'time.required' => 'La hora es requerida.',
        ];
    }
}
