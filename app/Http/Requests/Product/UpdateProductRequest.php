<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
                'name' => 'bail|required|unique:products,name',
                'description' => 'bail|required',
                'price' => 'bail|required|numeric'
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
            'name.required' => 'O nome do produto deve ser informado',
            'name.unique' => 'Já existe um produto cadastrado com esse nome',
            'description.required' => 'A descrição do produto precisa ser informada',
            'price.required' => 'O preço do produto precisa ser informado',
            'price.numeric' => 'Informe um preço válido'
        ];
    }
}
