<?php
namespace App\Services\Users;

use App\Helpers\Susuk;
use App\Enums\UserStatus;
use Illuminate\Http\Request;
use App\Models\User\Merchant;
use App\Models\Master\Category;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Laililmahfud\Adminportal\Services\AdminService;

class MerchantService extends AdminService
{
    public function __construct(
        public $model = Merchant::class,
    ) {
    }

    public function findAllMerchantName()
    {
        return $this->model::query()
            ->select(['id', 'name'])
            ->latest()
            ->get();
    }

    public function datatable(Request $request, $perPage = null)
    {
        $search = $request->search ?? '';

        $query = $this->model::with(['category:id,name'])
            ->where(function ($q) use ($search) {
                $q->orWhere("name", "like", "%" . $search . "%");
                $q->orWhere("description", "like", "%" . $search . "%");
                $q->orWhere("address", "like", "%" . $search . "%");
                $q->orWhere("pic_name", "like", "%" . $search . "%");
                $q->orWhere("phone_number", "like", "%" . $search . "%");
                $q->orWhere("whatsapp_number", "like", "%" . $search . "%");
                $q->orWhere("commission", "like", "%" . $search . "%");
                $q->orWhere("code", "like", "%" . $search . "%");
            });

        if ($perPage) {
            return $query->datatable($perPage, "created_at");
        } else {
            return $query->with(['province', 'city', 'subdistrict'])->get();
        }
    }

    public function store(Request $request)
    {
        return $this->model::create([
            "name" => $request->name,
            "profile" => Susuk::uploadFile($request->file('profile'), 'merchant/image'),
            "description" => $request->description,
            "category_id" => $request->category_id,
            "province_id" => $request->province_id,
            "city_id" => $request->city_id,
            "subdistrict_id" => $request->subdistrict_id,
            "address" => $request->address,
            "pic_name" => $request->pic_name,
            "phone_number" => $request->phone_number,
            "whatsapp_number" => $request->whatsapp_number,
            "commission" => [
                'start' => $request->commission_start,
                'end' => $request->commission_end,
            ],
            "weekdays" => $request->weekdays,
            "weekday_time" => [
                'start' => $request->weekday_time_start,
                'end' => $request->weekday_time_end,
            ],
            "weekends" => $request->weekends,
            "weekend_time" => [
                'start' => $request->weekend_time_start,
                'end' => $request->weekend_time_end,
            ],
            "siup_document" => Susuk::uploadFile($request->file('siup_document'), 'document'),
            "password" => Hash::make($request->password),
            'status' => UserStatus::Active
        ]);
    }

    public function update(Request $request, $uuid)
    {
        $data = $request->only([
            'name',
            'description',
            'category_id',
            'province_id',
            'city_id',
            'subdistrict_id',
            'address',
            'pic_name',
            'phone_number',
            'whatsapp_number',
            'weekdays',
            'weekends',
        ]);
        $data['commission'] = [
            'start' => $request->commission_start,
            'end' => $request->commission_end,
        ];
        $data['weekday_time'] = [
            'start' => $request->weekday_time_start,
            'end' => $request->weekday_time_end,
        ];
        $data['weekend_time'] = [
            'start' => $request->weekend_time_start,
            'end' => $request->weekend_time_end,
        ];
        if ($request->hasFile('profile')) {
            $data['profile'] = Susuk::uploadFile($request->file('profile'), 'merchant/image');
        }
        if ($request->hasFile('siup_document')) {
            $data['siup_document'] = Susuk::uploadFile($request->file('siup_document'), 'document');
        }

        return $this->model::whereUuid($uuid)->update($data);
    }

    public function getByCategory($categoryUuid, $limit = 0, $isPaginate = false)
    {
        $category = Category::where("uuid", $categoryUuid)->firstOrFail();
        $data = $this->model::where("category_id", $category->id)->orderBy("created_at", "desc");

        if ($isPaginate) {
            return $data->paginate();
        } else if ($limit == 0) {
            return $data->get();
        } else {
            return $data->limit($limit)->get();
        }
    }

    public function getLists($filter = [], $search = "", $paginate = true)
    {
        $categories = @$filter['categories'];
        $province = @$filter['province'];
        $city = @$filter['city'];
        $sort = @$filter['sort'];

        $data = $this->model::
            when($province, fn($q) => $q->where("province_id", $province))
            ->when($city, fn($q) => $q->where("city_id", $city))
            ->when($categories, fn($q) => $q->whereIn("category_id", $categories))
            ->when($search, fn($q) => $q->where("name", "LIKE", "%$search%"))
            ->orderBy("created_at", "desc");
        if ($paginate) {
            return $data->paginate();
        } else {
            return $data->get();
        }
    }

    public function findByUUid($uuid)
    {
        return $this->model::with(['products'])->where("uuid", $uuid)->firstOrFail();
    }

    public function findAndCountByUUid($uuid)
    {
        $data = $this->findByUUid($uuid);

        $this->model::where('uuid', $data->uuid)->update([
            'viewer' => $data->viewer + 1,
        ]);

        return $data;
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
}
