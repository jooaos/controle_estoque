<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateQuantityProductRequest extends FormRequest
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
            'quantitySend' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'quantity.required' => 'Informe a quantidade de unidades que serão retiradas do produto',
            'quantity.numeric' => 'A quantidade precisa ser um número'
        ];
    }
}
