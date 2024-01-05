<?php
namespace App\Actions\Admin\Orders;

use App\Enums\OrderType;
use App\Enums\UserStatus;
use App\Models\User\User;
use App\Enums\OrderStatus;
use App\Models\Data\Order;
use Illuminate\Support\Str;
use App\Models\Utils\Banner;
use App\Models\User\Merchant;
use App\Enums\CategoryProduct;
use App\Enums\CategoryMerchant;
use App\Enums\NotificationType;
use Illuminate\Support\Facades\DB;
use App\Models\Data\FeaturedProduct;
use App\Models\Data\FeaturedMerchant;
use App\Models\Notification\Notification;

class UpdateOrderStatus
{
     public function handle($uuid, $status)
     {
          DB::transaction(function () use ($uuid, $status) {
               $order = Order::where('uuid', $uuid)->firstOrFail();
               $update['status'] = OrderStatus::from($status);
               if ($status == 'paid') {
                    $update['pay_at'] = now();
                    $this->handlePaidOrder($order);
               }

               $order->update($update);
          });
     }

     private function handlePaidOrder($order)
     {

          $orderType = $order->type;
          $expiredBenefit = $order->expired_at;
          $userId = $order->user_id;
          $orderData = $order->data;
          // GUIDE SHOW MERCHANT
          if ($orderType == OrderType::Guide_Show_Merchant) {
               User::where('id', $userId)->update([
                    'is_member' => true,
                    'expired_member_at' => $expiredBenefit
               ]);
          }


          //  MERCHANT SHOW GUIDE
          if ($orderType == OrderType::Merchant_Show_Guide) {
               Merchant::where('id', $userId)->update([
                    'is_member' => true,
                    'expired_member_at' => $expiredBenefit
               ]);
          }


          // TOP MERCHANT
          if ($orderType == OrderType::Top_Merchant) {
               FeaturedMerchant::create([
                    'merchant_id' => $userId,
                    'order_id' => $order->id,
                    'category' => CategoryMerchant::Top_Merchant,
                    'start_at' => now(),
                    'expired_at' => $expiredBenefit
               ]);
          }


          // NEW MERCHANT
          if ($orderType == OrderType::New_Merchant) {
               FeaturedMerchant::create([
                    'merchant_id' => $userId,
                    'order_id' => $order->id,
                    'category' => CategoryMerchant::New_Merchant,
                    'start_at' => now(),
                    'expired_at' => $expiredBenefit
               ]);
          }



          // SPECIAL THIS MONTH
          if ($orderType == OrderType::Special_This_Month && @$orderData['product_id']) {
               FeaturedProduct::create([
                    'merchant_id' => $userId,
                    'order_id' => $order->id,
                    'product_id' => @$orderData['product_id'],
                    'category' => CategoryProduct::Special_This_Month,
                    'start_at' => now(),
                    'expired_at' => $expiredBenefit
               ]);
          }


          // ADDS BANNER
          if ($orderType == OrderType::Ads_Banner) {
               Banner::create([
                    'merchant_id' => $userId,
                    'expired_at' => $expiredBenefit,
                    'image' => $order->image,
                    'order_id' => $order->id
               ]);
          }


          // BLAST MERCHANT
          if ($orderType == OrderType::Blast_Merchant) {
               $this->blastUserNotification($userId, $orderData,$expiredBenefit, "merchant");
          }


          // BLAST PRODUCT
          if ($orderType == OrderType::Blast_Product) {
               $this->blastUserNotification($userId, $orderData,$expiredBenefit, "product");
          }


          // FAVORITE PRODUCT
          if ($orderType == OrderType::Favorite_Product && @$orderData['product_id']) {
               FeaturedProduct::create([
                    'merchant_id' => $userId,
                    'order_id' => $order->id,
                    'product_id' => @$orderData['product_id'],
                    'category' => CategoryProduct::Favorite_Product,
                    'start_at' => now(),
                    'expired_at' => $expiredBenefit
               ]);
          }



          // ❌
          // ADD PRODUCT


          // MERCHANT TOP ADDS

     }

     private function blastUserNotification($userId, $orderData,$expiredAt, $type)
     {
          $data = null;
          $merchant = Merchant::findOrFail($userId);
          $cityId = @$orderData['city_id'] ?: null;
          $languages = @$orderData['languages'] ?: null;
          $users = User::query()
               ->where('province_id', @$orderData['province_id'])
               ->where('profession_id', @$orderData['profession_id'])
               ->when($cityId && $cityId!=='all',fn($query)=>$query->where('city_id',$cityId))
               ->when($languages && !in_array('Semua',$languages),fn($query)=>$query->whereJsonContains('languages',  $languages))
               ->where('status', UserStatus::Active)
               ->select(['id'])
               ->get();

          $merchantAddress = [
               $merchant->address,
               $merchant->subdistrict?->name,
               $merchant->city?->name,
               $merchant->province?->name,
          ];
          $merchantCommission = $merchant->commission;
          if(@$merchantCommission['start'] == @$merchantCommission['end']){
               $merchantCommission = @$merchantCommission['start'] ."%";
          }else{
               $merchantCommission = @$merchantCommission['start'] ." - ".@$merchantCommission['end']."%";
          }
          $merchantInformation = [
               'id' => $merchant->id,
               'uuid' => $merchant->uuid,
               'name' => $merchant->name,
               'image' => asset($merchant->profile),
               'address' => implode(', ',$merchantAddress),
               'pic_name' => $merchant->pic_name,
               'phone_number' => $merchant->phone_number,
               'commission' => $merchantCommission,
          ];

          if ($type === 'merchant') {
               $data = [
                    'type' => 'merchant',
                    'uuid' => $merchant->uuid,
                    'id' => $merchant->id,
                    'merchant' => $merchantInformation,
                    'product' => null
               ];
          } else if ($type === 'product') {
               $product = Merchant::findOrFail($orderData['product_id']);
               $data = [
                    'type' => 'product',
                    'uuid' => $product->uuid,
                    'id' => $product->id,
                    'merchant' => $merchantInformation,
                    'product' => [
                         'id' => $product->id,
                         'uuid' => $product->uuid,
                         'name' => $product->name,
                         'image' => asset($product->image),
                         'price' => $product->price,
                         'commission' => $product->commission,
                    ]
               ];
          }

          $notificationItems = $users->map(fn($user) => [
               'uuid' => Str::uuid(),
               'user_id' => $user->id,
               'role' => 'guest',
               'type' => NotificationType::Blast,
               'title' => 'BLAST FROM MERCHANT',
               'description' => 'BLAST NOTIFICATION FROM MERCHANT',
               'data' => json_encode($data),
               'expired_at' => $expiredAt
          ])->values()->toArray();
          Notification::insert($notificationItems);
     }
}