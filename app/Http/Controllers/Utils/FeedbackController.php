<?php

namespace App\Http\Controllers\Utils;

use App\Http\Controllers\Controller;
use App\Services\Utils\ComplaintService;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function __construct(
        private ComplaintService $complaintService
    ){}

    public function complaint(Request $request)
    {
        $this->complaintService->complain($request, $request->user_role == "users" ? guide()->uuid : merchant()->uuid, $request->user_role);

        return back()->with(["popup_success" => "Komplain berhasil dikirim"]);
    }
}
