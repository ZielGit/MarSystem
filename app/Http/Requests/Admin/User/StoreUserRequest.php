<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'dni' => 'required|string|max:8|min:8|unique:users,dni',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'shift' => 'required|in:complete,morning,afternoon',
            'business' => 'required|in:main,branch_office',
            'roles.*' => 'integer',
            'roles' => 'required|array',
            'branch_office_id' => 'nullable|exists:branch_offices,id'
        ];
    }
}
