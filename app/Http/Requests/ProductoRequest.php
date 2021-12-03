<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductoRequest extends FormRequest
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
            'name' => 'required',
            'price' => 'required|numeric',
            'img' => 'required|mimes:jpeg,bmp,png,jpg',
            'video' => 'required|mimes:gif'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'El :attribute es requerido.',
            'mimes' => 'El :attribute no cumple con la extensión requerida.'
        ];
    }
}
