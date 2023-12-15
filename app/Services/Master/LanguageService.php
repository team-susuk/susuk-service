<?php
namespace App\Services\Master;

use Illuminate\Http\Request;
use App\Models\Master\Language;
use Laililmahfud\Adminportal\Services\AdminService;

class LanguageService extends AdminService
{
    public function __construct(
        public $model = Language::class,
    ) {
    }

    public function findAll(){
        return $this->model::latest()->get();
    }
    
    public function datatable(Request $request, $perPage = 10)
    {
        $search = $request->search ?? '';

        return $this->model::where(function ($q) use ($search) {
            $q->orWhere("lang", "like", "%" . $search . "%");
        })
            ->datatable($perPage, "languages.created_at");

    }

    public function store(Request $request)
    {
        return $this->model::create([
            "lang" => $request->lang,
        ]);
    }

    public function update(Request $request, $uuid)
    {
        $data = $request->only(['lang']);
        return $this->model::whereUuid($uuid)->update($data);
    }

    public function getLangs()
    {
        return $this->model::orderBy("lang", "ASC")->get()->map(function ($row) {
            $row->name = $row->lang;
            unset($row->lang);
            return $row;
        });
    }
}
