<?php
namespace App\Services\Utils;

use Illuminate\Http\Request;
use App\Models\Utils\PriceConfig;
use Laililmahfud\Adminportal\Services\AdminService;

class PriceConfigService extends AdminService
{
    public function __construct(
        public $model = PriceConfig::class,
    ) {
    }

    public function datatable(Request $request, $perPage = 10)
    {
        $search = $request->search ?? '';

        return $this->model::where(function ($q) use ($search) {
            $q->orWhere("name", "like", "%" . $search . "%");
            $q->orWhere("description", "like", "%" . $search . "%");
            $q->orWhere("type", "like", "%" . $search . "%");
            $q->orWhere("price", "like", "%" . $search . "%");
            $q->orWhere("discount", "like", "%" . $search . "%");
            $q->orWhere("discount_type", "like", "%" . $search . "%");
            $q->orWhere("benefit_value", "like", "%" . $search . "%");
            $q->orWhere("benefit_type", "like", "%" . $search . "%");
            ;
        })
            ->select("*")
            ->datatable($perPage, "price_configs.created_at");

    }

    public function store(Request $request)
    {

        $data = $request->only(['name', 'description', 'type', 'price', 'discount', 'discount_type', 'benefit_value', 'benefit_type']);
        return $this->model::create($data);
    }

    public function update(Request $request, $uuid)
    {
        $data = $request->only(['name', 'description', 'type', 'price', 'discount', 'discount_type', 'benefit_value', 'benefit_type']);

        return $this->model::whereUuid($uuid)->update($data);
    }
}
