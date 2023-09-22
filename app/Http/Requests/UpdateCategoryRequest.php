<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
        $rules =  [
            'name' => 'required|string|max:100|unique:categories,name',
            'status' => 'required|in:Active,Inactive'
        ];

        if ($this->isJson()) {
            $jsonData = json_decode($this->getContent(), true);
            foreach ($rules as $field => $rule) {
                if (!array_key_exists($field, $jsonData)) {
                    unset($rules[$field]);
                }
            }
        }

        return $rules;
    }
}
