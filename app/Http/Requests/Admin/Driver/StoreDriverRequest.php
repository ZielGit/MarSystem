<?php

namespace App\Http\Requests\Admin\Driver;

use Illuminate\Foundation\Http\FormRequest;

class StoreDriverRequest extends FormRequest
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
            'name' => 'required|string|unique:drivers,name',
            'phone' => 'required|string|unique:drivers,phone',
            'license_plate' => 'required|string|unique:drivers,license_plate',
            'freighter' => 'required|string',
            'license' => 'required|string|unique:drivers,license'
        ];
    }
}
