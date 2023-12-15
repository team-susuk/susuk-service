<?php
namespace App\Services\Data;

use App\Helpers\Susuk;
use App\Models\Data\Product;
use Illuminate\Http\Request;
use Laililmahfud\Adminportal\Services\AdminService;

class ProductService extends AdminService
{
    public function __construct(
        public $model = Product::class,
    ) {
    }

    public function datatable(Request $request, $perPage = 10)
    {
        $search = $request->search ?? '';

        $query = $this->model::with(['merchant'])
            ->where(function ($q) use ($search) {
                $q->orWhere("merchant_id", "like", "%" . $search . "%");
                $q->orWhere("name", "like", "%" . $search . "%");
                $q->orWhere("image", "like", "%" . $search . "%");
                $q->orWhere("description", "like", "%" . $search . "%");
                $q->orWhere("price", "like", "%" . $search . "%");
                $q->orWhere("commission", "like", "%" . $search . "%");
                $q->orWhere("viewer", "like", "%" . $search . "%");
                ;
            });
        if ($perPage) {
            return $query->datatable($perPage, "created_at");
        } else {
            return $query->get();
        }
    }

    public function store(Request $request)
    {
        return $this->model::create([
            "merchant_id" => $request->merchant_id,
            "name" => $request->name,
            "image" => Susuk::uploadFile($request->file('image'), 'products'),
            "description" => $request->description,
            "price" => $request->price,
            "commission" => $request->commission,
            'viewer' => 0
        ]);
    }

    public function update(Request $request, $uuid)
    {
        $data = $request->only(['merchant_id', 'name',  'description', 'price', 'commission']);
        if($request->hasFile('image')){
            $data['image'] = Susuk::uploadFile($request->file('image'), 'products');
        }
        return $this->model::whereUuid($uuid)->update($data);
    }
}
