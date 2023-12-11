<?php
namespace App\Services\Users;

use Illuminate\Http\Request;
use App\Models\User\Merchant;
use Laililmahfud\Adminportal\Services\AdminService;

class MerchantService extends AdminService
{
    public function __construct(
        public $model = Merchant::class,
    ) {}

    public function datatable(Request $request, $perPage = 10)
    {
        $search = $request->search ?? '';
        
        return $this->model::with(['category:id,name'])
            ->where(function ($q) use ($search) {
                $q->orWhere("name", "like", "%" . $search . "%");
                $q->orWhere("profile", "like", "%" . $search . "%");
                $q->orWhere("description", "like", "%" . $search . "%");
                $q->orWhere("category_id", "like", "%" . $search . "%");
                $q->orWhere("province_id", "like", "%" . $search . "%");
                $q->orWhere("city_id", "like", "%" . $search . "%");
                $q->orWhere("subdistrict_id", "like", "%" . $search . "%");
                $q->orWhere("address", "like", "%" . $search . "%");
                $q->orWhere("pic_name", "like", "%" . $search . "%");
                $q->orWhere("phone_number", "like", "%" . $search . "%");
                $q->orWhere("whatsapp_number", "like", "%" . $search . "%");
                $q->orWhere("commission", "like", "%" . $search . "%");
                $q->orWhere("weekdays", "like", "%" . $search . "%");
                $q->orWhere("weekday_time", "like", "%" . $search . "%");
                $q->orWhere("weekends", "like", "%" . $search . "%");
                $q->orWhere("weekend_time", "like", "%" . $search . "%");
                $q->orWhere("sip_document", "like", "%" . $search . "%");
                $q->orWhere("viewer", "like", "%" . $search . "%");
                $q->orWhere("is_member", "like", "%" . $search . "%");
                $q->orWhere("expired_member_at", "like", "%" . $search . "%");
                $q->orWhere("password", "like", "%" . $search . "%");
                $q->orWhere("deleted_at", "like", "%" . $search . "%");
                $q->orWhere("code", "like", "%" . $search . "%");;
            })
            ->select("*")
            ->datatable($perPage, "merchants.created_at");

    }
    
    public function store(Request $request)
    {
        return $this->model::create([
            "name" => $request->name,
            "profile" => $request->profile,
            "description" => $request->description,
            "category_id" => $request->category_id,
            "province_id" => $request->province_id,
            "city_id" => $request->city_id,
            "subdistrict_id" => $request->subdistrict_id,
            "address" => $request->address,
            "pic_name" => $request->pic_name,
            "phone_number" => $request->phone_number,
            "whatsapp_number" => $request->whatsapp_number,
            "commission" => $request->commission,
            "weekdays" => $request->weekdays,
            "weekday_time" => $request->weekday_time,
            "weekends" => $request->weekends,
            "weekend_time" => $request->weekend_time,
            "sip_document" => $request->sip_document,
            "viewer" => $request->viewer,
            "is_member" => $request->is_member,
            "expired_member_at" => $request->expired_member_at,
            "password" => $request->password,
            "deleted_at" => $request->deleted_at,
            "code" => $request->code,
        ]);
    }

    public function update(Request $request, $uuid)
    {
        $data =  $request->only(['name','profile','description','category_id','province_id','city_id','subdistrict_id','address','pic_name','phone_number','whatsapp_number','commission','weekdays','weekday_time','weekends','weekend_time','sip_document','viewer','is_member','expired_member_at','password','deleted_at','code']);

        return $this->model::whereUuid($uuid)->update($data);
    }
}
