<?php

namespace App\Http\Requests\Merchant\Auth;

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
            'name' => 'required',
            'image' => 'required',
            'description' => 'required',
            'category' => 'required',
            'province' => 'required',
            'city' => 'required',
            'subdistrict' => 'required',
            'address' => 'required',
            'pic_name' => 'required',
            'pic_phone' => 'required',
            'pic_phone_wa' => 'required|unique:merchants,whatsapp_number',
            'start_commission_range' => 'required',
            'end_commission_range' => 'required',
            'weekdays' => 'required',
            'open_time_weekdays' => 'required',
            'close_time_weekdays' => 'required',
            // 'weekends' => 'required',
            // 'open_time_weekends' => 'required',
            // 'close_time_weekends' => 'required',
            'password' => 'required|min:6|max:50',
            'password_confirmation' => 'required|min:6|max:50|same:password',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'pic_phone_wa.unique' => 'Nomor WA telah digunakan, silahkan gunakan nomor lain atau hubungi admin'
        ];
    }
}
