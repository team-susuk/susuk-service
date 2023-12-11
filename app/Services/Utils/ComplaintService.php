<?php
namespace App\Services\Utils;

use Illuminate\Http\Request;
use App\Models\Utils\Complaint;
use Laililmahfud\Adminportal\Services\AdminService;

class ComplaintService extends AdminService
{
    public function __construct(
        public $model = Complaint::class,
    ) {
    }

    public function datatable(Request $request, $perPage = 10)
    {
        $search = $request->search ?? '';

        return $this->model::where(function ($q) use ($search) {
            $q->orWhere("user_id", "like", "%" . $search . "%");
            $q->orWhere("user_role", "like", "%" . $search . "%");
            $q->orWhere("title", "like", "%" . $search . "%");
            $q->orWhere("message", "like", "%" . $search . "%");
            ;
        })
            ->select("*")
            ->datatable($perPage, "complaints.created_at");

    }

    public function update(Request $request, $uuid)
    {
        $data = $request->only(['user_id', 'user_role', 'title', 'message']);

        return $this->model::whereUuid($uuid)->update($data);
    }
}
