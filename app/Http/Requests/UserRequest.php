<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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

            'nombre' => 'required|min:3',
            'correo_electronico' => 'required|email|unique:users,email',
            'telefóno' => 'min:10|max:10|required',
            'contraseña' => 'min:8|max:15|required_with:confirmar_contraseña|same:confirmar_contraseña',
            'confirmar_contraseña' => 'required|min:8|max:15'
        ];
    }
}
