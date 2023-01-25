<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservabusRequest extends FormRequest
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
            'local_saida' => 'bail|required',
            'local_destino' => 'bail|required',
            'data_saida' => 'bail|required',
            'data_retorno' => 'bail|required',
            'data_retorno' => 'bail|required',
            'Passageiros' => 'bail|required',
            'km' => 'bail|required',
            'finalidade' => 'bail|required',
            'diaria' => 'bail|required',
            'motorista' => 'bail|required',
            'nome_local' => 'bail|required',
            'endereco' => 'bail|required',
            'cidade' => 'bail|required',
            'uf' => 'bail|required',
            'contato' => 'bail|required',
            'email' => 'bail|required',
            'estacionamento' => 'bail|required',
            'roteiro' => 'bail|required',
            'objetivo' => 'bail|required',
            'publico' => 'bail|required',
            'servidores' => 'bail|required',
        ];
    }
}
