<?php
namespace App\Http\Controllers\Admin\Users;

use App\Enums\UserStatus;
use App\Services\Master\LanguageService;
use App\Services\Master\ProfessionService;
use Illuminate\Http\Request;
use App\Services\Users\UserService;
use Laililmahfud\Adminportal\Controllers\AdminController;

class AdminGuideController extends AdminController
{
    protected $routePath = "admin.guide";
    protected $pageTitle = "Guide";
    protected $resourcePath = "admin.users.guide";
    protected $moduleService = UserService::class;
    protected $filter = false;
    protected $export = true;

    protected $tableColumns = [
        ["label" => "Nama Lengkap", "name" => "name"],
        ["label" => "Nama Panggilan", "name" => "nick_name"],
        ["label" => "ID Guide", "name" => "code"],
        ["label" => "Nomor Whatsapp", "name" => "phone_number"],
        ["label" => "Waktu Registrasi", "name" => "register_at"],
        ["label" => "Status", "name" => "status"],
    ];

    protected $rules = [
        "name" => "required",
        "nick_name" => "required",
        "birthday" => "required",
        "phone_number" => "required",
        "profession_id" => "required",
        "languages" => "required",
    ];

    protected $createRules = [
        "password" => "required",
        'profile' => 'required|image'
    ];

    public function __construct(
        private ProfessionService $professionService,
        private LanguageService $languageService,
        private UserService $userService
    ) {
    }

    public function create(Request $request)
    {
        $this->data = [
            'professions' => $this->professionService->findAll(),
            'languages' => $this->languageService->findAll(),
            'status' => UserStatus::cases()
        ];
        return parent::create($request);
    }

    public function edit(Request $request, $uuid)
    {
        $this->data = [
            'professions' => $this->professionService->findAll(),
            'languages' => $this->languageService->findAll(),
            'status' => UserStatus::cases()
        ];
        return parent::edit($request, $uuid);
    }

    public function show(Request $request, $uuid)
    {
        $row = $this->userService->findByUuId($uuid);
        return view('admin.users.guide.detail', [
            'row' => $row
        ]);
    }

}
