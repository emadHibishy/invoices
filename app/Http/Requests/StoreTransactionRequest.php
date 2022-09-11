<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTransactionRequest extends FormRequest
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
            'warehouse_id' => 'required|integer',
            'transaction_type_id' => 'required|integer',
            'product_id' => 'required|integer',
//            'uom_id' => 'required|integer',
            'qty' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'warehouse_id.required' => __('backend/transactions.warehouse_required'),
            'warehouse_id.integer' => __('backend/transactions.warehouse_integer'),

            'transaction_type_id.required' => __('backend/transactions.transaction_type_required'),
            'transaction_type_id.integer' => __('backend/transactions.transaction_type_integer'),

            'product_id.required' => __('backend/transactions.product_required'),
            'product_id.integer' => __('backend/transactions.product_integer'),

//            'uom_id.required' => __('backend/transactions.uom_required'),
//            'uom_id.integer' => __('backend/transactions.uom_integer'),

            'qty.required' => __('backend/transactions.qty_required')


        ];
    }
}
