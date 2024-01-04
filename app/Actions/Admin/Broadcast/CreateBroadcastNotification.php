<?php
namespace App\Actions\Admin\Broadcast;

use App\Helpers\Susuk;
use App\Enums\UserStatus;
use App\Models\User\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\User\Merchant;
use App\Enums\NotificationType;
use Illuminate\Support\Facades\DB;
use App\Models\Notification\Broadcast;
use App\Models\Notification\Notification;

class CreateBroadcastNotification
{
     public function handle(Request $request)
     {
          DB::transaction(function () use ($request) {
               $file = null;
               $fileProperties = null;
               $forRole = $request->for_role;
               $title = $request->title;
               $description = $request->description;
               $type = $request->type;
               $notificationData = null;
               if ($type !== 'text') {
                    $files = $request->file('file_gambar') ?: $request->file('file');
                    $fileProperties = [
                         'size' => Susuk::formatBytes($files->getSize()),
                         'filename' => $files->getClientOriginalName(),
                         'extension' => $files->getClientOriginalExtension()
                    ];
                    $file = Susuk::uploadFile($files, 'broadcast');
                    $notificationData = [
                         'url' => asset($file),
                         'properties' => $fileProperties,
                         'type' => $type // text_image | text_file
                    ];
               }
               $broadcastData = [
                    "type" => $type,
                    "for_role" => $forRole,
                    "title" => $title,
                    "description" => $description,
                    "file" => $file,
                    "file_properties" => $fileProperties,
               ];
               $broadcast = Broadcast::create($broadcastData);



               $usersList = collect([]);
               if ($forRole === 'merchant') {
                    $usersList = $this->findAllMerchant();
               } else if ($forRole == 'guide') {
                    $usersList = $this->findAllGuest();
               } else {
                    $merchant = $this->findAllMerchant()->toArray();
                    $guest = $this->findAllGuest()->toArray();
                    $usersList = collect([
                         ...$merchant,
                         ...$guest
                    ]);
               }
               $notificationItems = $usersList->map(fn($user) => [
                    'uuid' => Str::uuid(),
                    'user_id' => $user['id'],
                    'role' => $user['role'],
                    'type' => NotificationType::Information,
                    'title' => $title,
                    'description' => $description,
                    'broadcast_id' => $broadcast->id,
                    'data' => json_encode($notificationData),
                    'created_at' => now()
               ])->values()->toArray();
               Notification::insert($notificationItems);
          });
     }

     private function findAllMerchant()
     {
          return Merchant::where('status', UserStatus::Active)
               ->select(['id'])
               ->get()
               ->map(fn($row)=>[
                    'id' => $row->id,
                    'role' => 'merchant'  
               ]);
     }

     private function findAllGuest()
     {
          return User::where('status', UserStatus::Active)
               ->select(['id'])
               ->get()
               ->map(fn($row)=>[
                    'id' => $row->id,
                    'role' => 'guest'  
               ]);
     }
}