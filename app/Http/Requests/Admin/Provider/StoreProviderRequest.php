<?php

namespace App\Http\Requests\Admin\Provider;

use Illuminate\Foundation\Http\FormRequest;

class StoreProviderRequest extends FormRequest
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
            'name' => 'required|string|unique:providers,name',
            'ruc' => 'required|string|max:11|min:11|unique:providers,ruc',
            'email' => 'nullable|string|email|unique:providers,email',
            'phone' => 'nullable|string|unique:providers,phone'
        ];
    }
}
