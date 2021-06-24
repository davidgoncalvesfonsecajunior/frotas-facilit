<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehicleRequest extends FormRequest
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
            'placa' => "bail|required|unique:vehicles,placa,$this->vehicle|min:6|max:8",
            'chassi' => "bail|required|unique:vehicles,chassi,$this->vehicle",
            'marca' => 'bail|required|min:3|max:10',
            'modelo' => 'bail|required|min:2|max:15',
            'ano' => 'bail|required',
            'cor' => 'bail|required|min:3|max:15',
            'combustivel' => 'bail|required',
            'km' => 'bail|required| max:20',
            'status' => 'bail|required|boolean',


        ];
    }
}
