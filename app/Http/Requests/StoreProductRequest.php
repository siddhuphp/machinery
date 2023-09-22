<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'category_id' => 'required|numeric',
            'price' => 'required|numeric',
            'offer_price' => 'numeric|nullable',
            'status' => 'required|string|in:Active,Inactive',
            'short_desc' => 'required|string',
            'description' => 'required|string',
            'product_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'meta_title' => 'string|nullable',
            'meta_keywords' => 'string|nullable',
            'meta_desc' => 'string|nullable',
        ];
    }
}
