<?php
namespace App\Services\Region;

use Illuminate\Http\Request;
use App\Models\Region\SubDistrict;
use Laililmahfud\Adminportal\Services\AdminService;

class SubDistrictService extends AdminService
{
    public function __construct(
        public $model = SubDistrict::class,
    ) {
    }

    public function datatable(Request $request, $perPage = 10)
    {
        $search = $request->search ?? '';

        return $this->model::with(['province:id,name', 'city:id,name'])
            ->where(function ($q) use ($search) {
                $q->orWhere("name", "like", "%" . $search . "%");
                $q->orWhere("code", "like", "%" . $search . "%");
            })
            ->datatable($perPage, "subdistricts.created_at");

    }

    public function store(Request $request)
    {
        return $this->model::create([
            "name" => $request->name,
            "code" => $request->code,
            "province_id" => $request->province_id,
            "city_id" => $request->city_id,
        ]);
    }

    public function update(Request $request, $uuid)
    {
        $data = $request->only(['name', 'code', 'province_id', 'city_id']);

        return $this->model::whereUuid($uuid)->update($data);
    }
}
