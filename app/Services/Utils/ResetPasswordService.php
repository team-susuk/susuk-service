<?php
namespace App\Services\Utils;

use App\Models\User\Merchant;
use App\Models\User\User;
use Illuminate\Http\Request;
use App\Models\Utils\ResetPassword;
use Illuminate\Support\Facades\Hash;
use Laililmahfud\Adminportal\Services\AdminService;

class ResetPasswordService extends AdminService
{
    public function __construct(
        public $model = ResetPassword::class,
    ) {
    }

    public function datatable(Request $request, $perPage = 10)
    {
        $search = $request->search ?? '';

        return $this->model::query()
            ->leftJoin('users', 'users.id', 'reset_password.user_id')
            ->leftJoin('merchants', 'merchants.id', 'reset_password.user_id')
            ->where(function ($query) use ($search) {
                $query->where('users.name', 'like', "%" . $search . "%");
                $query->orWhere('merchants.name', 'like', "%" . $search . "%");
            })
            ->select(['reset_password.*', 'users.name as user_name', 'merchants.name as merchant_name'])
            ->datatable($perPage, "reset_password.created_at");

    }

    public function update(Request $request, $uuid)
    {
        $properties = [
            'password' => Hash::make($request->password)
        ];
        $data = $this->model::whereUuid($uuid)->firstOrFail();
        if($data->role=='users'){
            User::where('id',$data->user_id)->update($properties);
        }else{
            Merchant::where('id',$data->user_id)->update($properties);
        }
        return $data->update([
            'status' => 'done',
            'resolve_at' => now()
        ]);
    }

    public function findByUuId($uuid)
    {
        return $this->model::query()
            ->leftJoin('users', 'users.id', 'reset_password.user_id')
            ->leftJoin('merchants', 'merchants.id', 'reset_password.user_id')
            ->select(['reset_password.*', 'users.name as user_name', 'merchants.name as merchant_name'])
            ->where('reset_password.uuid', $uuid)
            ->firstOrFail();
    }
}
