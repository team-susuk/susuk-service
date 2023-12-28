<?php

namespace App\Actions\Merchant\Auth;

use Carbon\Carbon;
use App\Helpers\Susuk;
use App\Enums\UserStatus;
use App\Http\Requests\Merchant\Auth\LoginRequest;
use Illuminate\Http\Request;
use App\Models\User\Merchant;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Validation\ValidationException;

class LoginAction {

    /**
     * Summary of handle
     * @param \Illuminate\Http\Request $registerCompanyDto
     */
    public function handle(LoginRequest $request)
    {
        $number = Susuk::formatIndonesianPhoneNumber($request->phone_number);
        $user = Merchant::whereWhatsappNumber($number)->first();
        $bank = Susuk::getBankInformation();

        if ($user && Hash::check($request->password, $user->password)) {
            if ($user->status == UserStatus::Waiting_Approval) {
                throw ValidationException::withMessages([
                    'phone_number' => "Akun anda masih menunggu persetujuan dari admin, silahkan hubungi admin ke nomor WA ". $bank->whatsapp
                ]);
            }
            if ($user->status == UserStatus::Rejected) {
                throw ValidationException::withMessages([
                    'phone_number' => "Akun anda ditolak, silahkan hubungi admin ke nomor WA ". $bank->whatsapp
                ]);
            }
            if ($user->status == UserStatus::Non_Active) {
                throw ValidationException::withMessages([
                    'phone_number' => "Akun anda non aktif, silahkan hubungi admin ke nomor WA ". $bank->whatsapp
                ]);
            }

            $isMember = $user->is_member;
            if (Carbon::now() > $user->expired_member_at) $isMember = 0;

            Carbon::setLocale("id");

            $sessionObject = [
                'id' => $user->id,
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
                'category_id' => $user->category?->id,
                'province_id' => $user->province?->id,
                'city_id' => $user->city?->id,
                'subdistrict_id' => $user->subdistrict?->id,
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