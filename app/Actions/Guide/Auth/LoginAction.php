<?php

namespace App\Actions\Guide\Auth;

use Carbon\Carbon;
use App\Helpers\Susuk;
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
    public function handle(Request $request)
    {
        $user = User::wherePhoneNumber($request->phone_number)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            $isMember = $user->is_member;
            if (Carbon::now() > $user->expired_member_at) $isMember = 0;

            Carbon::setLocale("id");

            $sessionObject = [
                'uuid' => $user->uuid,
                'name' => $user->name,
                'nick_name' => $user->nick_name,
                'birthday' => $user->birthday,
                'birthday_formated' => Carbon::parse($user->birthday)->format("d F Y"),
                'phone_number' => $user->phone_number,
                'profile' => Susuk::showFile($user->profile),
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