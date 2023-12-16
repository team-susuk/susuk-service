<?php

namespace App\Actions\Merchant\Auth;

use Carbon\Carbon;
use App\Helpers\Susuk;
use App\Models\User\Merchant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Validation\ValidationException;

class LoginAction {

    /**
     * Summary of handle
     * @param \Illuminate\Http\Request $registerCompanyDto
     */
    public function handle(Request $request)
    {
        $user = Merchant::whereWhatsappNumber($request->phone_number)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            $isMember = $user->is_member;
            if (Carbon::now() > $user->expired_member_at) $isMember = 0;

            Carbon::setLocale("id");

            $sessionObject = [
                'uuid' => $user->uuid,
                'name' => $user->name,
                'whatsapp_number' => $user->whatsapp_number,                
                'profile' => Susuk::showFile($user->profile),
                'siup_document' => Susuk::showFile($user->siup_document),
                'description' => $user->description,
                'category' => $user->category?->name,
                'province' => $user->province?->name,
                'city' => $user->city?->name,
                'subdistrict' => $user->subdistrict?->name,
                'address' => $user->address,
                'full_address' => $user->full_address,
                'pic_name' => $user->pic_name,
                'phone_number' => $user->phone_number,
                'commission' => $user->commission,
                'full_commission' => $user->full_commission,
                'weekdays' => $user->weekdays,
                'weekday_time' => $user->weekday_time,
                'weekends' => $user->weekends,
                'weekend_time' => $user->weekend_time,
                'status' => $user->status,
                'code' => $user->code,
                'qrcode_id' => Crypt::encrypt((object) [
                    'code' => $user->code,
                    'source' => "susuk-member"
                ]),
                "is_member" => $isMember
            ];

            session()->put(config('services.session-merchant-prefix'), (object) $sessionObject);
        } else {
            throw ValidationException::withMessages([
                'password' => __("alert.password")
            ]);
        }
    }
}