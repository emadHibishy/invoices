<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'category_name' => 'required|max:30|unique:categories,category_name->ar,'. $this->id,
            'category_name_en' => 'required|max:30|unique:categories,category_name->en,'. $this->id,
            'description' => 'max:300',
        ];
    }

    public function messages(): array
    {
        return [
            'category_name.required' => 'يرجى إدخال اسم القسم.',
            'category_name.max' => 'اسم القسم يجب الا يكون اكثر من 30 حرف.',
            'category_name.unique' => 'اسم القسم موجود بالفعل, برجاء تغييره.',
        ];
    }
}
