<?php

namespace App\Actions\Guide\Auth;

use Carbon\Carbon;
use App\Helpers\Susuk;
use App\Enums\UserStatus;
use App\Http\Requests\Guide\Auth\LoginRequest;
use App\Models\User\User;
use Illuminate\Http\Request;
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
        $number = preg_replace('/\D/', '', $request->phone_number);
        $user = User::wherePhoneNumber($number)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            if ($user->status == UserStatus::Waiting_Approval) {
                throw ValidationException::withMessages([
                    'phone_number' => "Akun anda masih menunggu persetujuan dari admin"
                ]);
            }
            if ($user->status == UserStatus::Rejected) {
                throw ValidationException::withMessages([
                    'phone_number' => "Akun anda ditolak, silahkan hubungi admin"
                ]);
            }
            if ($user->status == UserStatus::Non_Active) {
                throw ValidationException::withMessages([
                    'phone_number' => "Akun anda non aktif, silahkan hubungi admin"
                ]);
            }

            $isMember = $user->is_member;
            if (Carbon::now() > $user->expired_member_at) $isMember = 0;

            Carbon::setLocale("id");

            $sessionObject = [
                'id' => $user->id,
                'uuid' => $user->uuid,
                'name' => $user->name,
                'nick_name' => $user->nick_name,
                'birthday' => $user->birthday,
                'birthday_formated' => Carbon::parse($user->birthday)->format("d F Y"),
                'phone_number' => $user->phone_number,
                'profile' => Susuk::showFile($user->profile),
                'province' => $user->province?->name,
                'city' => $user->city?->name,
                'subdistrict' => $user->subdistrict?->name,
                'category_id' => $user->category?->id,
                'province_id' => $user->province?->id,
                'city_id' => $user->city?->id,
                'subdistrict_id' => $user->subdistrict?->id,
                'profession_id' => $user->profession_id,
                'profession' => $user->profession?->name,
                'languages' => $user->languages,
                'status' => $user->status,
                'code' => $user->code,
                'qrcode_id' => Crypt::encrypt((object) [
                    'code' => $user->code,
                    'source' => "susuk-guide"
                ]),
                "is_member" => $isMember
            ];

            session()->put(config('services.session-guide-prefix'), (object) $sessionObject);
        } else {
            throw ValidationException::withMessages([
                'password' => __("alert.password")
            ]);
        }
    }
}