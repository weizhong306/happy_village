<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'account' => 'required|string',
            'password' => 'required|string|min:8'
        ];
    }

    // public function attributes(): array
    // {
    //     return [
    //         'account' => '使用者帳號',
    //         'password' => '使用者密碼'
    //     ];
    // }

    public function messages(): array
    {
        return [
            'account.required' => '使用者名稱必填',
            'password.required' => '使用者密碼必填'
        ];
    }

    public function bodyParameters(): array
    {
        return [
            'account' => [
                'description' => '帳號',
                'required' => true,
                'type' => 'string'
            ],
            'password' => [
                'description' => '密碼',
                'required' => true,
                'type' => 'string'
            ]
        ];
    }
}
