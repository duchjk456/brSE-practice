<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email|max:20|unique:users',
            'password' => 'required|max:10',
            // Rule::exists('admins', 'email'),
        ];
    }

    public function messages() {
        return [
            // 'email.required' => 'Vui long nhap email',
            'email.email' => 'Email sai dinh dang',
            'email.max' => 'Email dai qua 20 ki tu',
            'email.unique' => 'Email nay da duoc su dung boi account khac',
            // 'password.required' => 'Vui long nhap mat khau',
            'password.max' => 'Mat khau dai qua 10 ki tu',
        ];
    }
}
