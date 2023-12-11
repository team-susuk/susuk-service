<?php
namespace App\Services\Regions;

use App\Models\Regions\City;
use Illuminate\Http\Request;
use Laililmahfud\Adminportal\Services\AdminService;

class CityService extends AdminService
{
    public function __construct(
        public $model = City::class,
    ) {
    }

    public function datatable(Request $request, $perPage = 10)
    {
        $search = $request->search ?? '';

        return $this->model::with('province')
            ->where(function ($q) use ($search) {
                $q->orWhere("name", "like", "%" . $search . "%");
                $q->orWhere("code", "like", "%" . $search . "%");
            })
            ->datatable($perPage, "cities.created_at");

    }

    public function store(Request $request)
    {
        return $this->model::create([
            "name" => $request->name,
            "code" => $request->code,
            "province_id" => $request->province_id,
        ]);
    }

    public function update(Request $request, $uuid)
    {
        $data = $request->only(['name', 'code', 'province_id']);

        return $this->model::whereUuid($uuid)->update($data);
    }
}
