<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name' => 'required|max:255',
            'sku' => 'required|unique:products,sku|max:255',
            'quantity' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'É necessário informar o nome do produto',
            'name.max' => 'O produto deve ter no máximo 255 caracteres',
            'sku.required' => 'É necessário informar o código do produto',
            'sku.unique' => 'Já exite um produto com esse código no estoque',
            'sku.max' => 'O código deve ter no máximo 255 caracteres',
            'quantity.required' => 'É necessário informar a quantidade de produtos no estoque',
            'quantity.numeric' => 'A quantidade de produtos precisa ser um valor numérico'
        ];
    }
}
