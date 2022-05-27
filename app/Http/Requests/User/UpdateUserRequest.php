<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
                'name' => 'bail|required',
                'email' => 'bail|required|email|unique:users,email'
            ];  
    }

    /**
    * Get the error messages for the defined validation rules.
    *
    * @return array
    */
    public function messages()
    {
        return [
            'name.required' => 'O nome do usuário deve ser informado',
            'email.required' => 'O e-mail do usuário deve ser informado',
            'email.unique' => 'Esse e-mail já está cadastrado',
            'email.email' => 'Digite um endereço de e-mail válido'
        ];
    }
}
