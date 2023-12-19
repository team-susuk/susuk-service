<?php
namespace App\Actions\Admin\Broadcast;

use App\Models\Notification\Broadcast;
use App\Models\Notification\Notification;
use Illuminate\Support\Facades\DB;

class DeleteBroadcastNotification
{
     public function handle($uuid)
     {
          DB::transaction(function () use ($uuid) {
               $broadcast = Broadcast::where('uuid', $uuid)->firstOrFail();
               Notification::query()
                    ->where('broadcast_id', $broadcast->id)
                    ->delete();

               $broadcast->delete();
          });
     }
}