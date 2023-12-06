<?php
namespace App\Http\Controllers\Admin\Utils;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Utils\SettingService;

class AdminSettingsController extends Controller
{
    private $allowed = [
        "rekening_number",
        "rekening_bank",
        "rekening_name",
        "whatsapp"
    ];

    public function __construct(
        private SettingService $settingService
    ) {
    }

    public function index(Request $request)
    {
        return view('admin.utils.settings', [
            'setting' => $this->settingService->findAll($this->allowed),
        ]);
    }

    public function store(Request $request)
    {
        foreach ($request->only($this->allowed) as $name => $value) {
            $this->settingService->model::updateOrCreate(['name' => $name], [
                'name' => $name,
                'value' => $value
            ]);
        }

        return to_route("admin.settings.index")->with(['success' => "Setting berhasil diperbarui !"]);
    }
}
