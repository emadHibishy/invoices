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
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' =>'required|unique:products,name->ar,'.$this->id,
            'name_en' => 'required|unique:products,name->en,'.$this->id,
            'category_id' => 'required|numeric',
            'price' => 'required|numeric'
        ];
    }

    public function messages() :array
    {
        return [
            'name.unique' => __('backend/products.ar_name_unique'),
            'name_en.unique' => __('backend/products.en_name_unique'),
            'name.required' => __('backend/products.ar_name_require'),
            'name_en.required' => __('backend/products.en_name_require'),
            'price.required' => __('backend/products.price_required'),
        ];
    }
}
