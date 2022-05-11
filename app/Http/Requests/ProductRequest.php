<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'code' => 'required|min:5|max:255|unique:products,code',
            'name' => 'required|min:5|max:255',
            'category_id' => 'required',
            'description' => 'required|min:5',
            'price' => 'required|numeric|min:1'
        ];

        if ($this->route()->named('products.update')) {
            $rules['code'] .= ',' . $this->route()->parameter('product')->id;
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'unique' => 'Поле должно быть уникальным',
            'required' => 'Поле не может быть пустым',
            'price.min' => 'Цена должна быть >= 1',
            'min' => 'Поле должно быть длиной минимум :min символов',
            'max' => 'Поле должно быть длиной максимум :max символов',
            'numeric' => 'Поле должно быть числом'
        ];
    }
}
