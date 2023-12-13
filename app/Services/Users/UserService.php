<?php
namespace App\Services\Users;

use App\Models\User\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
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

    public function updatePassword(Request $request, $uuid)
    {
        $user = $this->model::whereUuid($uuid)->first();
        if (!Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                "password" => __("alert.password")
            ]);
        }

        $password = Hash::make($request->new_password);
        return $this->model::whereUuid($uuid)->update([
            'password' => $password
        ]);
    }

    public function updateProfle(Request $request, $uuid)
    {
        $data = [
            'nick_name' => $request->name,
            'profession_id' => $request->profession,
            'languages' => $request->languages
        ];

        
        $this->model::whereUuid($uuid)->update($data);
        $user = $this->model::whereUuid($uuid)->first();

        $guide = guide();
        $guide->nick_name = $request->name;
        $guide->profession_id = $request->profession;
        $guide->profession = $user->profession?->name;
        $guide->languages = $request->languages;

        session()->put(config('services.session-guide-prefix'), (object) $guide);
    }

}
