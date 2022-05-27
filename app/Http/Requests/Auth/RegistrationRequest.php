<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() : bool
    {
        return true;
    }

    /**
    * Get the validation rules that apply to the request.
    *
    * @return array
    */
    public function rules() : array
    {
        return [
                'name' => 'bail|required',
                'email' => 'bail|required|email|unique:users,email',
                'password' => 'bail|required|confirmed'
            ];  
    }

    /**
    * Get the error messages for the defined validation rules.
    *
    * @return array
    */
    public function messages() : array
    {
        return [
            'name.required' => 'O nome do usuário deve ser informado',
            'email.required' => 'O e-mail do usuário deve ser informado',
            'email.unique' => 'Esse e-mail já está cadastrado',
            'email.email' => 'Digite um endereço de e-mail válido',
            'password.required' => 'Uma senha precisa ser informada',
            'password.confirmed' => 'A senha precisa ser confirmada'
        ];
    }
}
