<?php
namespace App\Services\Utils;

use App\Models\User\Merchant;
use App\Models\User\User;
use Illuminate\Http\Request;
use App\Models\Utils\Complaint;
use Laililmahfud\Adminportal\Services\AdminService;

class ComplaintService extends AdminService
{
    public function __construct(
        public $model = Complaint::class,
    ) {
    }

    public function datatable(Request $request, $perPage = null)
    {
        $search = $request->search ?? '';

        $query = $this->model::where(function ($q) use ($search) {
            $q->orWhere("user_id", "like", "%" . $search . "%");
            $q->orWhere("user_role", "like", "%" . $search . "%");
            $q->orWhere("title", "like", "%" . $search . "%");
            $q->orWhere("message", "like", "%" . $search . "%");
        });
        if ($perPage) {
            return $query->datatable($perPage, "created_at");
        } else {
            return $query->get();
        }

    }

    public function update(Request $request, $uuid)
    {
        $data = $request->only(['user_id', 'user_role', 'title', 'message']);

        return $this->model::whereUuid($uuid)->update($data);
    }

    public function complain(Request $request, $userId, $role)
    {
        if ($role == 'users') {
            $user = User::whereUuid($userId)->first();
        } else {
            $user = Merchant::whereUuid($userId)->first();
        }

        $this->model::create([
            "user_id" => $user->id,
            "user_role" => $role,
            "title" => $request->title,
            "message" => $request->message
        ]);
    }
}
