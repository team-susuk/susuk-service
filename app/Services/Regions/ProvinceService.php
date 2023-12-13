<?php
namespace App\Services\Regions;

use Illuminate\Http\Request;
use App\Models\Regions\Province;
use Laililmahfud\Adminportal\Services\AdminService;

class ProvinceService extends AdminService
{
    public function __construct(
        public $model = Province::class,
    ) {
    }

    public function datatable(Request $request, $perPage = 10)
    {
        $search = $request->search ?? '';

        return $this->model::where(function ($q) use ($search) {
            $q->orWhere("name", "like", "%" . $search . "%");
            $q->orWhere("code", "like", "%" . $search . "%");
        })
            ->datatable($perPage, "provinces.created_at");

    }

    public function store(Request $request)
    {
        return $this->model::create([
            "name" => $request->name,
            "code" => $request->code,
        ]);
    }

    public function update(Request $request, $uuid)
    {
        $data = $request->only(['name', 'code']);

        return $this->model::whereUuid($uuid)->update($data);
    }

    public function getProvinces()
    {
        return $this->model::with(['cities'])->orderBy("name", "ASC")->get();
    }
}
