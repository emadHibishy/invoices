<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTerritoryRequest extends FormRequest
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
            'ar_territory_name' => 'required|unique:territories,name->ar,' . $this->id,
            'en_territory_name' => 'required|unique:territories,name->en,' . $this->id,
            'abbreviation' => 'required|max:3|unique:territories,abbreviation',
        ];
    }

    public function messages()
    {
        return [
            'ar_territory_name.required' => __('backend/territories.ar_name_require'),
            'ar_territory_name.unique' => __('backend/territories.ar_name_unique'),
            'en_territory_name.required' => __('backend/territories.en_name_require'),
            'en_territory_name.unique' => __('backend/territories.en_name_unique'),
            'abbreviation.unique' => __('backend/territories.abbreviation_unique'),
            'abbreviation.max' => __('backend/territories.abbreviation_max'),
            'abbreviation.required' => __('backend/territories.abbreviation_require'),
        ];
    }
}
