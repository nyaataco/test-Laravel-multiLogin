<?php

namespace App\Http\Requests\Owner;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
        $UserId = $this->route('id');

        return [
            'user_id' => [
                'required',
                'integer',
                Rule::unique('Users')->ignore($UserId, 'User_id'),
            ],
            'name' => 'required|max:50',
            'email' => [
                'required',
                'email',
                'max:50',
                Rule::unique('Users')->ignore($UserId, 'User_id'),
            ],

        ];
    }
}
