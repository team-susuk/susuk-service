<?php

namespace App\Actions\Merchant\Product;

use App\Helpers\Susuk;
use App\Http\Requests\Merchant\ProductRequest;
use App\Models\Data\Product;
use Illuminate\Http\Request;
use App\Models\User\Merchant;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProductAction {
    /**
     * Summary of handle
     */
    public function handle(ProductRequest $request)
    {
        DB::transaction(function () use ($request) {
            $price = preg_replace("/[^0-9]/", "", $request->price);

            Product::create([
                'merchant_id' => merchant()->id,
                'name' => $request->name,
                'image' => Susuk::uploadFile($request->file('image'), "products/image"),
                'description' => $request->description,
                'commission' => $request->commission,
                'price' => $price,
                'viewer' => 0
            ]);
        });
    }

    public function handleUpdate(ProductRequest $request, $id)
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
