<?php

namespace App\Http\Requests\Admin\Gathering;

use Illuminate\Foundation\Http\FormRequest;

class StoreGatheringRequest extends FormRequest
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
            // 'user_id' => 'exists:users,id',
            'provider_id' => 'required|exists:providers,id',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
            'carton_weight' => 'required|numeric',
            'plastic_weight' => 'required|numeric',
            'paper_weight' => 'required|numeric',
            'overall_weight' => 'required|numeric'
        ];
    }
}
