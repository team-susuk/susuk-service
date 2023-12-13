<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;
use Tightenco\Ziggy\Ziggy;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): string|null
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        $guideSession = guide();
        $merchantSession = merchant();

        $flashProperties = [];
        $authProperties = [];

        if ($errorFlash = $request->session()->get('error'))
            $flashProperties['error'] = $errorFlash;
        if ($successFlash = $request->session()->get('success'))
            $flashProperties['success'] = $successFlash;
        if ($popupSuccessFlash = $request->session()->get('popup_success'))
            $flashProperties['popup_success'] = $popupSuccessFlash;
        if ($passId = $request->session()->get('passId'))
            $flashProperties['passId'] = $passId;

        if ($guideSession) {
            $authProperties['guide'] = $guideSession;
        }

        if ($merchantSession) {
            $authProperties['merchant'] = $merchantSession;
        }

        return [
            ...parent::share($request),
            'auth' => [
                ...$authProperties
            ],
            'flash' => [
                ...$flashProperties
            ],
            'ziggy' => fn () => [
                ...(new Ziggy)->toArray(),
                'location' => $request->url(),
            ],
            'logo_bca' => asset('img/bca.png')
        ];
    }
}
