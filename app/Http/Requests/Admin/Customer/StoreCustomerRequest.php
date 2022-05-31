<?php

namespace App\Http\Requests\Admin\Customer;

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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'type' => 'required|in:store,municipality',
            'email' => 'nullable|string|email|unique:customers,email',
            'document_type' => 'required|in:RUC,DNI',
            'document_number' => 'required|unique:customers,document_number',
            'phone' => 'nullable|string|unique:customers,phone',
            'address' => 'nullable|string'
        ];
    }
}
