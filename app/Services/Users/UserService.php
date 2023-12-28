<?php
namespace App\Services\Users;

use App\Helpers\Susuk;
use App\Enums\UserStatus;
use App\Models\User\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Master\Profession;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Laililmahfud\Adminportal\Services\AdminService;
use App\Http\Requests\Profile\ChangePasswordRequest;

class UserService extends AdminService
{
    public function __construct(
        public $model = User::class,
    ) {
    }

    public function datatable(Request $request, $perPage = null)
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

        $user = $this->model::whereUuid($uuid)->firstOrFail();
        $data = $request->only(['name', 'nick_name', 'birthday', 'phone_number', 'profession_id', 'languages', 'status']);
        if ($request->file('profile')) {
            $data['profile'] = Susuk::uploadFile($request->file('profile'), "guide/image");
        }
        if ($request->status == 'active' && !$user->verification_at) {
            $data['verification_at'] = now();
        }
        if($request->password && $request->password!=''){
            $data['password'] = Hash::make($request->password);
        }
        return $user->update($data);
    }

    public function updatePassword(ChangePasswordRequest $request, $uuid)
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

    public function updateProfile(Request $request, $uuid)
    {
        $data = [
            'nick_name' => $request->name,
            'profession_id' => $request->profession,
            'languages' => $request->languages,
            'province_id' => $request->province,
            'city_id' => $request->city,
            'subdistrict_id' => $request->subdistrict,
        ];


        $this->model::whereUuid($uuid)->update($data);
        $user = $this->model::whereUuid($uuid)->first();

        $guide = guide();
        $guide->nick_name = $request->name;
        $guide->profession_id = $request->profession;
        $guide->profession = $user->profession?->name;
        $guide->province = $user->province?->name;
        $guide->city = $user->city?->name;
        $guide->subdistrict = $user->subdistrict?->name;
        $guide->category_id = $user->category?->id;
        $guide->province_id = $user->province?->id;
        $guide->city_id = $user->city?->id;
        $guide->subdistrict_id = $user->subdistrict?->id;

        session()->put(config('services.session-guide-prefix'), (object) $guide);
    }

    public function getCountUsers()
    {
        $guideType = $this->getProfession('Guide');
        $guide = $this->model::where('profession_id', $guideType->id)->count();

        $driverType = $this->getProfession('Driver');
        $driver = $this->model::where('profession_id', $driverType->id)->count();

        $freelanceType = $this->getProfession('Freelance');
        $freelance = $this->model::where('profession_id', $freelanceType->id)->count();

        return (object)[
            'guide' => $guide,
            'driver' => $driver,
            'freelance' => $freelance,
        ];
    }

    public function getProfession($name)
    {
        return Profession::where("name", $name)->first();
    }

    public function getListMembers($filter = [])
    {
        $languages = @$filter['languages'];
        $province = @$filter['province'];
        $city = @$filter['city'];
        $profession = @$filter['profession'];
        if ($profession) {
            $profession = $this->getProfession(Str::ucfirst($profession))?->id;
        }

        return $this->model::
            when($province, fn($q) => $q->where("province_id", $province))
            ->when($city, fn($q) => $q->where("city_id", $city))
            ->where(function ($q) use ($languages) {
                if ($languages) {
                    foreach ($languages as $value) {
                        $q->orWhere("languages", "LIKE", "%{$value}%");
                    }
                }
            })
            ->when($profession, fn($q) => $q->where("profession_id", $profession))
            ->orderBy("created_at", "desc")->paginate();
    }

}
