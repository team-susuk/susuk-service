<?php
namespace App\Services\Master;

use Illuminate\Http\Request;
use App\Models\Master\Category;
use Laililmahfud\Adminportal\Services\AdminService;

class CategoryService extends AdminService
{
    public function __construct(
        public $model = Category::class,
    ) {}

    public function datatable(Request $request, $perPage = 10)
    {
        $search = $request->search ?? '';
        
        return $this->model::where(function ($q) use ($search) {
                $q->orWhere("name", "like", "%" . $search . "%");;
            })
            ->select("*")
            ->datatable($perPage, "categories.created_at");

    }
    
    public function store(Request $request)
    {
        return $this->model::create([
            "name" => $request->name,
        ]);
    }

    public function update(Request $request, $uuid)
    {
        $data =  $request->only(['name']);

        return $this->model::whereUuid($uuid)->update($data);
    }
}
