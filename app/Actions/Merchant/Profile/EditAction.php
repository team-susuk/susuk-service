<?php

namespace App\Actions\Merchant\Profile;

use App\Helpers\Susuk;
use Illuminate\Http\Request;
use App\Models\User\Merchant;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Merchant\Profile\ProfileRequest;

class EditAction {
    /**
     * Summary of handle
     */
    public function handle(ProfileRequest $request)
    {
        DB::transaction(function () use ($request) {
            $data = [
                "description" => $request->description,
                "category_id" => $request->category,
                "pic_name" => $request->pic_name,
                "phone_number" => Susuk::formatIndonesianPhoneNumber($request->pic_phone),
                "whatsapp_number" => Susuk::formatIndonesianPhoneNumber($request->pic_phone_wa),
                "commission" => json_encode((object)[
                    "start" => $request->start_commission_range,
                    "end" => $request->end_commission_range
                ]),
                "weekdays" => $request->weekdays,
                "weekday_time" => json_encode((object)[
                    "start" => $request->open_time_weekdays,
                    "end" => $request->close_time_weekdays,
                ]),
                "weekends" => $request->weekends ?? [],
                "weekend_time" => json_encode((object)[
                    "start" => $request->open_time_weekends ?? "",
                    "end" => $request->close_time_weekends ?? "",
                ])
            ];

            if ($request->hasFile("document")) {
                $data["siup_document"] = Susuk::uploadFile($request->file("document"), "merchant/siup");
            }

            if ($request->hasFile("image")) {
                $data["profile"] = Susuk::uploadFile($request->file("image"), "merchant/image");
            }

            Merchant::whereUuid(merchant()->uuid)->update($data);

            $user = Merchant::whereUuid(merchant()->uuid)->first();
            $merchant = merchant();
            $merchant->description = $user->description;
            $merchant->profile = Susuk::showFile($user->profile);
            $merchant->pic_name = $user->pic_name;
            $merchant->phone_number = $user->phone_number;
            $merchant->whatsapp_number = $user->whatsapp_number;
            $merchant->category = $user->category?->name;
            $merchant->weekdays = $user->weekdays;
            $merchant->weekday_time = $user->weekday_time;
            $merchant->weekends = $user->weekends;
            $merchant->weekend_time = $user->weekend_time;
            $merchant->commission = $user->commission;
            $merchant->full_commission = $user->full_commission;


            session()->put(config('services.session-merchant-prefix'), (object) $merchant);
        });
    }
}
