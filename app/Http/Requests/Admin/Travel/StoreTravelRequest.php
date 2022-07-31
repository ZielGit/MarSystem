<?php

namespace App\Http\Requests\Admin\Travel;

use Illuminate\Foundation\Http\FormRequest;

class StoreTravelRequest extends FormRequest
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
            'driver_id' => 'required|exists:drivers,id',
            'branch_office_id' => 'required|exists:branch_offices,id',
            'departure_date' => 'required|date|date_format:Y-m-d|before:arrival_date',
            'arrival_date' => 'required|date|date_format:Y-m-d|after:departure_date'
        ];
    }
}
