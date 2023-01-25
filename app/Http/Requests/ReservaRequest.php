<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservaRequest extends FormRequest
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
            'data_saida' => 'bail|required',
            'data_retorno' => 'bail|required',
            'observacoes' => 'bail',
            'local_saida' => 'bail|required',
            'local_destino' => 'bail|required',
            'check' => 'required',
            'roteiro_viagem' => 'required'
        ];
    }
}
