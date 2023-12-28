<?php

namespace App\Actions\Guide\Auth;

use Carbon\Carbon;
use App\Helpers\Susuk;
use App\Enums\UserStatus;
use App\Models\User\User;
use Illuminate\Http\Request;
use App\Models\Utils\ResetPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use App\Http\Requests\Guide\Auth\LoginRequest;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\Guide\Auth\ForgotRequest;

class LoginAction {

    /**
     * Summary of handle
     * @param \Illuminate\Http\Request $registerCompanyDto
     */
    public function handle(LoginRequest $request)
    {
        // $number = Susuk::formatIndonesianPhoneNumber($request->phone_number);
        $number = $request->phone_number;
        $user = User::wherePhoneNumber($number)->first();
        $bank = Susuk::getBankInformation();

        if (!$user) {
            throw ValidationException::withMessages([
                'phone_number' => "The selected phone number does not exist."
            ]);
        }

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

    public function requestPassword (ForgotRequest $request)
    {
        $number = $request->phone_number;
        $user = User::wherePhoneNumber($number)->first();

        ResetPassword::create([
            'user_id' => $user->id,
            'name' => $request->name,
            'name' => 'name',
            'phone_number' => $number,
            'request_at' => Carbon::now(),
            'status' => 'pending'
        ]);
    }
}