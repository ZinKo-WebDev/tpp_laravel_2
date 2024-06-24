<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
//            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }
}
