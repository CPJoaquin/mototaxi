<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidatorMotoRequest extends FormRequest
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
            'placa' => ['required', 'min:7'],
            'user_id' => ['required'],
            'color' => ['required'],
            'marc' => ['required'],
            'model' => ['required'],
        ];
    }
    public function messages(){
        return[
            'placa.required' => 'Debe introducir la placa de la motocicleta.',
            'placa.min' => 'La placa tiene como minimo 7 caracteres.',
            'user_id.required' => 'debe seleccionar un conductor.',
            'color.required' => 'Se requiere dato de la motocicleta.',
            'marc.required' => 'El dato de la marca es necesario.',
            'model.required' =>  'El modelo es un campo rqeurerido.',
        ];
    }
}
