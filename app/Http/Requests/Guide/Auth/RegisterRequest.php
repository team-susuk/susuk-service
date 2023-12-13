<?php

namespace App\Http\Requests\Guide\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'idcard_name' => 'required',
            'name' => 'required',
            'date_of_birth' => 'required',
            'phone_number' => 'required|unique:users,phone_number',
            'image' => 'required',
            'profession' => 'required',
            'languages' => 'required',
            'password' => 'required|min:6|max:50',
            'password_confirmation' => 'required|min:6|max:50|same:password',
        ];
    }
}
