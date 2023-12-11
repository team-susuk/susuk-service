<?php
namespace App\Services\Users;

use App\Models\User\User;
use Illuminate\Http\Request;
use Laililmahfud\Adminportal\Services\AdminService;

class UserService extends AdminService
{
    public function __construct(
        public $model = User::class,
    ) {}

    public function datatable(Request $request, $perPage = 10)
    {
        $search = $request->search ?? '';
        
        return $this->model::where(function ($q) use ($search) {
                $q->orWhere("name", "like", "%" . $search . "%");
                $q->orWhere("nick_name", "like", "%" . $search . "%");
                $q->orWhere("birthday", "like", "%" . $search . "%");
                $q->orWhere("phone_number", "like", "%" . $search . "%");
                $q->orWhere("profile", "like", "%" . $search . "%");
                $q->orWhere("profession_id", "like", "%" . $search . "%");
                $q->orWhere("languages", "like", "%" . $search . "%");
                $q->orWhere("password", "like", "%" . $search . "%");
                $q->orWhere("status", "like", "%" . $search . "%");
                $q->orWhere("register_at", "like", "%" . $search . "%");
                $q->orWhere("verification_at", "like", "%" . $search . "%");
                $q->orWhere("deleted_at", "like", "%" . $search . "%");
                $q->orWhere("code", "like", "%" . $search . "%");
                $q->orWhere("is_member", "like", "%" . $search . "%");
                $q->orWhere("expired_member_at", "like", "%" . $search . "%");;
            })
            ->select("*")
            ->datatable($perPage, "users.created_at");

    }
    
    public function store(Request $request)
    {
        return $this->model::create([
            "name" => $request->name,
            "nick_name" => $request->nick_name,
            "birthday" => $request->birthday,
            "phone_number" => $request->phone_number,
            "profile" => $request->profile,
            "profession_id" => $request->profession_id,
            "languages" => $request->languages,
            "password" => $request->password,
            "status" => $request->status,
            "register_at" => $request->register_at,
            "verification_at" => $request->verification_at,
            "deleted_at" => $request->deleted_at,
            "code" => $request->code,
            "is_member" => $request->is_member,
            "expired_member_at" => $request->expired_member_at,
        ]);
    }

    public function update(Request $request, $uuid)
    {
        $data =  $request->only(['name','nick_name','birthday','phone_number','profile','profession_id','languages','password','status','register_at','verification_at','deleted_at','code','is_member','expired_member_at']);

        return $this->model::whereUuid($uuid)->update($data);
    }
}
