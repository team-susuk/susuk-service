<?php

namespace App\Http\Requests\Merchant\Profile;

use App\Models\User\Merchant;
use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
        $merchant = Merchant::findByUuid(merchant()->uuid);
        return [
            'description' => 'required',
            'category' => 'required',
            'pic_name' => 'required',
            'pic_phone' => 'required',
            'pic_phone_wa' => 'required|unique:merchants,whatsapp_number,'.$merchant->id,
            'start_commission_range' => 'required',
            'end_commission_range' => 'required',
            'weekdays' => 'required',
            'open_time_weekdays' => 'required',
            'close_time_weekdays' => 'required',
            'weekends' => 'required',
            'open_time_weekends' => 'required',
            'close_time_weekends' => 'required'
        ];
    }
}
