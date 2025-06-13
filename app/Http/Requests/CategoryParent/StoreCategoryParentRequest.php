<?php

namespace App\Http\Requests\CategoryParent;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryParentRequest extends FormRequest
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
        return [
            "name" => "required|string|max:255",
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống',
            'name.string' => 'Giá trị phải là chuỗi',
            'name.max' => 'Tên không được dài quá 255 ký tự',
        ];
    }

}
