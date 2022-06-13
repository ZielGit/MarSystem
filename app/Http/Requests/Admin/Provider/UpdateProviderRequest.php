<?php

namespace App\Http\Requests\Admin\Provider;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProviderRequest extends FormRequest
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
            'name' => 'required|string|unique:providers,name,'.$this->route('provider')->id,
            'ruc' => 'required|string|max:11|min:11|unique:providers,ruc,'.$this->route('provider')->id,
            'email' => 'nullable|string|email|unique:providers,email,'.$this->route('provider')->id,
            'phone' => 'nullable|string|unique:providers,phone,'.$this->route('provider')->id
        ];
    }
}
