<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
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
        $id = $this->route()->product->id ?? null;
        return [
            'name' => 'required|unique:products,name,' . $id,
            'price' => 'required',
        ];
    }
    
    public function attributes(): array
    {
        return [
            'name' => __('keywords.name'),
            'price' => __('keywords.price'),
        ];
    }
    
    public function messages(): array
    {
        return [
            'name.required' => __('keywords.name_required_message'),
            'price.required' => __('keywords.price_required_message'),
        ];
    }
}
