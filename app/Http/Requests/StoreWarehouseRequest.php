<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWarehouseRequest extends FormRequest
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
            'code' => 'required|max:4|unique:warehouses',
            'ar_warehouse_name' => 'required|unique:warehouses,name->ar,'. $this->id,
            'en_warehouse_name' => 'required|unique:warehouses,name->en,'. $this->id,
        ];
    }

    public function messages()
    {
        return [
          'code.required' => __('backend/warehouses.code_required'),
          'code.max' => __('backend/warehouses.code_max'),
          'code.unique' => __('backend/warehouses.code_unique'),
          'ar_warehouse_name.required' => __('backend/warehouses.ar_warehouse_name_required'),
          'ar_warehouse_name.unique' => __('backend/warehouses.ar_warehouse_name_unique'),
          'en_warehouse_name.required' => __('backend/warehouses.en_warehouse_name_required'),
          'en_warehouse_name.unique' => __('backend/warehouses.en_warehouse_name_unique'),
        ];
    }
}
