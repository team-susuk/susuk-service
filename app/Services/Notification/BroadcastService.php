<?php
namespace App\Services\Notification;

use Illuminate\Http\Request;
use App\Models\Notification\Broadcast;
use Laililmahfud\Adminportal\Services\AdminService;

class BroadcastService extends AdminService
{
    public function __construct(
        public $model = Broadcast::class,
    ) {}

    public function datatable(Request $request, $perPage = 10)
    {
        $search = $request->search ?? '';
        
        return $this->model::where(function ($q) use ($search) {
                $q->orWhere("type", "like", "%" . $search . "%");
                $q->orWhere("for_role", "like", "%" . $search . "%");
                $q->orWhere("title", "like", "%" . $search . "%");
                $q->orWhere("description", "like", "%" . $search . "%");
                $q->orWhere("file", "like", "%" . $search . "%");
                $q->orWhere("file_properties", "like", "%" . $search . "%");;
            })
            ->select("*")
            ->datatable($perPage, "broadcasts.created_at");

    }
    
    public function store(Request $request)
    {
        return $this->model::create([
            "type" => $request->type,
            "for_role" => $request->for_role,
            "title" => $request->title,
            "description" => $request->description,
            "file" => $request->file,
            "file_properties" => $request->file_properties,
        ]);
    }

    public function update(Request $request, $uuid)
    {
        $data =  $request->only(['type','for_role','title','description','file','file_properties']);

        return $this->model::whereUuid($uuid)->update($data);
    }
}
