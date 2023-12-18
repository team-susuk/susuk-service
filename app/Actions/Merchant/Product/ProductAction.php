<?php

namespace App\Actions\Merchant\Product;

use App\Helpers\Susuk;
use App\Models\Data\Product;
use Illuminate\Http\Request;
use App\Models\User\Merchant;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProductAction {
    /**
     * Summary of handle
     * @param \Illuminate\Http\Request $registerCompanyDto
     */
    public function handle(Request $request)
    {
        DB::transaction(function () use ($request) {
            $price = preg_replace("/[^0-9]/", "", $request->price);
            $merchant = Merchant::findByUuid(merchant()->uuid);

            Product::create([
                'merchant_id' => $merchant->id,
                'name' => $request->name,
                'image' => Susuk::uploadFile($request->file('image'), "products/image"),
                'description' => $request->description,
                'commission' => $request->commission,
                'price' => $price,
                'viewer' => 0
            ]);
        });
    }

    public function handleUpdate(Request $request, $id)
    {
        DB::transaction(function () use ($request, $id) {
            $price = preg_replace("/[^0-9]/", "", $request->price);

            $data = [
                'name' => $request->name,
                'description' => $request->description,
                'commission' => $request->commission,
                'price' => $price
            ];

            if ($request->hasFile("image")) {
                $data['image'] = Susuk::uploadFile($request->file('image'), "products/image");
            }

            Product::where("uuid", $id)->update($data);
        });
    }
}
