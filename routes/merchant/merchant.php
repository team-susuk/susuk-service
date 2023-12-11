<?php

use App\Http\Controllers\Merchant\Auth\LoginController;
use App\Http\Controllers\Merchant\Auth\RegisterController;
use App\Http\Controllers\Merchant\HomeController;
use App\Http\Controllers\Merchant\InboxController;
use App\Http\Controllers\Merchant\MemberController;
use App\Http\Controllers\Merchant\ProfileController;
use App\Http\Controllers\Merchant\QrCodeController;
use Illuminate\Support\Facades\Route;

Route::prefix("merchant")
    ->as("merchant.")
    ->group(function () {
        Route::get("/login", [LoginController::class, 'index'])->name("login");
        Route::get("/register", [RegisterController::class, 'index'])->name("register");

        Route::get("/", [HomeController::class, 'index'])->name("home");
        Route::get("/inbox", [InboxController::class, 'index'])->name("inbox.index");
        Route::get("/member", [MemberController::class, 'index'])->name("member.index");

        Route::controller(ProfileController::class)
        ->prefix("profile")
        ->name("profile.")
        ->group(function () {
            Route::get('/', 'index')->name("index");
        });

        Route::controller(QrCodeController::class)
        ->prefix("qrcode")
        ->name("qrcode.")
        ->group(function () {
            Route::get('/', 'index')->name("index");
            Route::get('/histories', 'histories')->name("histories");
        });
    });