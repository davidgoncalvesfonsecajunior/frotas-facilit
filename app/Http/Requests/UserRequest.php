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

            'nome' => 'bail|required',
            'telefone' => 'bail|required',
            'data_nasc' => 'bail|required',
            'cpf' => 'bail|required|numeric',
            'email' => 'bail|required|email',
            'password' => 'bail|required|',
            'departamento_id' => 'bail|required',

        ];
    }
}
