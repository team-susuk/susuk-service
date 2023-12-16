<?php

namespace App\Actions\Merchant\Auth;

use App\Helpers\Susuk;
use Illuminate\Http\Request;
use App\Models\User\Merchant;
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
                "name" => $request->name,
                "profile" => Susuk::uploadFile($request->file("image"), "merchant/image"),
                "description" => $request->description,
                "category_id" => $request->category,
                "province_id" => $request->province,
                "city_id" => $request->city,
                "subdistrict_id" => $request->subdistrict,
                "address" => $request->address,
                "pic_name" => $request->pic_name,
                "phone_number" => $request->pic_phone,
                "whatsapp_number" => $request->pic_phone_wa,
                "commission" => (object)[
                    "start" => $request->start_commission_range,
                    "end" => $request->end_commission_range
                ],
                "weekdays" => $request->weekdays,
                "weekday_time" => (object)[
                    "start" => $request->open_time_weekdays,
                    "end" => $request->close_time_weekdays,
                ],
                "weekends" => $request->weekends,
                "weekend_time" => (object)[
                    "start" => $request->open_time_weekends,
                    "end" => $request->close_time_weekends,
                ],
                "password" => Hash::make($request->password)
            ];

            if ($request->hasFile("document")) {
                $data["siup_document"] = Susuk::uploadFile($request->file("document"), "merchant/siup");
            }

            Merchant::create($data);
        });
    }
}
