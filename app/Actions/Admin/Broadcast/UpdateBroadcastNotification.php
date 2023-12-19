<?php
namespace App\Actions\Admin\Broadcast;

use App\Helpers\Susuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Notification\Broadcast;

class UpdateBroadcastNotification
{
     public function handle(Request $request, $uuid)
     {
          DB::transaction(function () use ($request, $uuid) {
               $broadcast = Broadcast::where('uuid',$uuid)->firstOrFail();

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
               $broadcast->update($broadcastData);
          });
     }
}