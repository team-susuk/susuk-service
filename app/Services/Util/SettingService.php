<?php
namespace App\Services\Util;

use App\Models\Util\Setting;
use Illuminate\Http\Request;
use Laililmahfud\Adminportal\Services\AdminService;

class SettingService extends AdminService
{
    public function __construct(
        public $model = Setting::class,
    ) {
    }

    public function value($name)
    {
        return $this->model::where('name', $name)->value('value');
    }

    public function findAll($names = [])
    {
        $items = null;
        $all = $this->model::whereIn('name', $names)->select(['name', 'value'])->get();
        foreach ($all as $row) {
            $items[$row->name] = $row->value;
        }
        return (object) $items;
    }
}
