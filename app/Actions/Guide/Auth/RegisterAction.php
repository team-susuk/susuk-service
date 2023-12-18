<?php

namespace App\Actions\Guide\Auth;

use App\Helpers\Susuk;
use App\Models\User\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterAction {
    /**
     * Summary of handle
     * @param \Illuminate\Http\Request $registerCompanyDto
     */
    public function handle(Request $request)
    {
        DB::transaction(function () use ($request) {
            $data = [
                "name" => $request->idcard_name,
                "nick_name" => $request->name,
                "birthday" => $request->date_of_birth,
                "phone_number" => Susuk::formatIndonesianPhoneNumber($request->phone_number),
                "profile" => Susuk::uploadFile($request->file("image"), "guide/image"),
                "province_id" => $request->province,
                "city_id" => $request->city,
                "subdistrict_id" => $request->subdistrict,
                "profession_id" => $request->profession,
                "languages" => $request->languages,
                "password" => Hash::make($request->password)
            ];

            User::create($data);
        });
    }
}
