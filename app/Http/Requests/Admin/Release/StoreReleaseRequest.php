<?php

namespace App\Http\Requests\Admin\Release;

use Illuminate\Foundation\Http\FormRequest;

class StoreReleaseRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'customer_id' => 'required|exists:customers,id',
            'product_type_id' => 'required|exists:product_types,id',
            'lot' => 'nullable|numeric',
            'quantity_released' => 'required|numeric',
            'observations' => 'nullable|string'
        ];
    }
}
