<?php
namespace App\Services\Master;

use Illuminate\Http\Request;
use App\Models\Master\Profession;
use Laililmahfud\Adminportal\Services\AdminService;

class ProfessionService extends AdminService
{
    public function __construct(
        public $model = Profession::class,
    ) {}

    public function findAll(){
        return $this->model::latest()->get();
    }
    public function datatable(Request $request, $perPage = 10)
    {
        $search = $request->search ?? '';
        
        return $this->model::where(function ($q) use ($search) {
                $q->orWhere("name", "like", "%" . $search . "%");;
            })
            ->datatable($perPage, "professions.created_at");

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
