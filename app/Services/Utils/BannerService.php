<?php
namespace App\Services\Utils;

use App\Helpers\Susuk;
use App\Models\Utils\Banner;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Laililmahfud\Adminportal\Helpers\AdminPortal;
use Laililmahfud\Adminportal\Services\AdminService;

class BannerService extends AdminService
{
    public function __construct(
        public $model = Banner::class,
    ) {
    }

    public function datatable(Request $request, $perPage = 10)
    {
        $search = $request->search ?? '';

        return $this->model::where(function ($q) use ($search) {
            $q->orWhere("expired_at", "like", "%" . $search . "%");
            $q->orWhere("sorting", "like", "%" . $search . "%");
        })
            ->datatable($perPage, "banners.sorting");

    }

    public function store(Request $request)
    {
        return $this->model::create([
            "image" => AdminPortal::uploadFile($request->image),
            "title" => $request->title,
            "description" => $request->description,
            "sorting" => $request->sorting,
        ]);
    }

    public function update(Request $request, $uuid)
    {
        $data = $request->only(['title', 'description', 'sorting']);
        if($request->hasFile('image')){
            $data['image'] = AdminPortal::uploadFile($request->image);
        }
        return $this->model::whereUuid($uuid)->update($data);
    }

    public function getBanners()
    {
        return $this->model::whereDate("expired_at", "<=", Carbon::now()->endOfDay())->orderBy("sorting", "asc")->get()->map(function ($row) {
            $row->image = Susuk::showFile($row->image);
            return $row;
        });
    }
}
