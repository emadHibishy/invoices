<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
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
            'ar_customer_name' => 'required|unique:customers,name->ar,'. $this->id,
            'en_customer_name' => 'required|unique:customers,name->en,'. $this->id,
            'city_id' => 'required',
            'territory_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'ar_customer_name.required' => __('backend/customers.ar_name_require'),
            'en_customer_name.required' => __('backend/customers.en_name_require'),
            'ar_customer_name.unique' => __('backend/customers.ar_name_unique'),
            'en_customer_name.unique' => __('backend/customers.en_name_unique'),
            'city_id.required' => __('backend/customers.city_require'),
            'territory_id.required' => __('backend/customers.territory_require'),
        ];
    }
}
