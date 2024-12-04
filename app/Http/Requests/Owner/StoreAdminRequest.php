<?php

namespace App\Http\Requests\Owner;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreAdminRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'admin_id' => [
                'required',
                'integer',
                Rule::unique('admins'),
            ],
            'name' => 'required|max:50',
            'email' => [
                'required',
                'email',
                'max:50',
                Rule::unique('admins'),
            ],
            'password' =>'required|min:8|max:20|confirmed',
        ];
    }
}
