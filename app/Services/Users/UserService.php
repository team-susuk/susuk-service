<?php
namespace App\Services\Users;

use App\Helpers\Susuk;
use App\Enums\UserStatus;
use App\Models\User\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Laililmahfud\Adminportal\Services\AdminService;

class UserService extends AdminService
{
    public function __construct(
        public $model = User::class,
    ) {
    }

    public function datatable(Request $request, $perPage = 10)
    {
        $search = $request->search ?? '';
        $query = $this->model::where(function ($q) use ($search) {
            $q->orWhere("name", "like", "%" . $search . "%");
            $q->orWhere("nick_name", "like", "%" . $search . "%");
            $q->orWhere("phone_number", "like", "%" . $search . "%");
            $q->orWhere("languages", "like", "%" . $search . "%");
            $q->orWhere("password", "like", "%" . $search . "%");
            $q->orWhere("status", "like", "%" . $search . "%");
            $q->orWhere("code", "like", "%" . $search . "%");
        });
        if ($perPage) {
            return $query->datatable($perPage, "users.created_at");
            ;
        } else {
            return $query->with(['profession'])->get();
        }

    }

    public function store(Request $request)
    {
        return $this->model::create([
            "name" => $request->name,
            "nick_name" => $request->nick_name,
            "birthday" => $request->birthday,
            "phone_number" => $request->phone_number,
            "profile" => Susuk::uploadFile($request->file('profile'), "guide/image"),
            "profession_id" => $request->profession_id,
            "languages" => $request->languages,
            "password" => Hash::make($request->password),
            "status" => UserStatus::Active,
            "register_at" => now(),
            "verification_at" => now(),
        ]);
    }

    public function update(Request $request, $uuid)
    {

        $data = $request->only(['name', 'nick_name', 'birthday', 'phone_number', 'profession_id', 'languages', 'status']);
        if ($request->file('profile')) {
            $data['profile'] = Susuk::uploadFile($request->file('profile'), "guide/image");
        }
        $user = $this->model::whereUuid($uuid)->firstOrFail();
        if ($request->status == 'active' && !$user->verification_at) {
            $data['verification_at'] = now();
        }
        return $user->update($data);
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
