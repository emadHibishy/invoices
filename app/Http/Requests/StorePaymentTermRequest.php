<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePaymentTermRequest extends FormRequest
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
            'ar_term_name' => 'required|unique:payment_terms,name->ar,' . $this->id,
            'en_term_name' => 'required|unique:payment_terms,name->en,' . $this->id,
            'days' => 'integer'
        ];
    }

    public function messages()
    {
        return [
            'ar_term_name.required' => __('backend/terms.ar_name_require'),
            'en_term_name.required' => __('backend/terms.en_name_require'),
            'ar_term_name.unique' => __('backend/terms.ar_name_unique'),
            'en_term_name.unique' => __('backend/terms.en_name_unique'),
            'days.integer' => __('backend/terms.days_int'),
        ];
    }
}
