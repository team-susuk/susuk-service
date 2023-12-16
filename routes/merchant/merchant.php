<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Merchant\HomeController;
use App\Http\Controllers\Merchant\InboxController;
use App\Http\Controllers\Utils\FeedbackController;
use App\Http\Controllers\Merchant\MemberController;
use App\Http\Controllers\Merchant\QrCodeController;
use App\Http\Controllers\Merchant\ProfileController;
use App\Http\Controllers\Merchant\Auth\LoginController;
use App\Http\Controllers\Merchant\Auth\RegisterController;

Route::prefix("merchant")
    ->as("merchant.")
    ->group(function () {
        Route::middleware("role-guest:merchant")->group(function() {
            Route::get("/login", [LoginController::class, 'index'])->name("login");
            Route::post("/login", [LoginController::class, 'store'])->name("login.store");
            Route::get("/register", [RegisterController::class, 'index'])->name("register");
            Route::post("/register", [RegisterController::class, 'store'])->name("register.store");
        });

        Route::middleware("role-auth:merchant")->group(function() {
            Route::get("/", [HomeController::class, 'index'])->name("home");
            Route::get("/inbox", [InboxController::class, 'index'])->name("inbox.index");
            Route::get("/inbox-data", [InboxController::class, 'indexData'])->name("inbox.index-data");
            Route::get("/member", [MemberController::class, 'index'])->name("member.index");
            Route::post("/logout", [LoginController::class, 'logout'])->name("logout");
    
            Route::controller(ProfileController::class)
            ->prefix("profile")
            ->name("profile.")
            ->group(function () {
                Route::get('/', 'index')->name("index");

                Route::post('/change-password', 'changePassword')->name("change-password");
            });
    
            Route::controller(QrCodeController::class)
            ->prefix("qrcode")
            ->name("qrcode.")
            ->group(function () {
                Route::get('/', 'index')->name("index");
                Route::get('/histories', 'histories')->name("histories");

                Route::get('/histories-data', 'historiesData')->name("histories-data");
            });

            Route::controller(FeedbackController::class)
            ->prefix("feedback")
            ->name("feedback.")
            ->group(function () {
                Route::post('/complaint', 'complaint')->name("complaint");
            });
        });

    });