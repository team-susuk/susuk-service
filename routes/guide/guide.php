<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Guide\HomeController;
use App\Http\Controllers\Guide\InboxController;
use App\Http\Controllers\Guide\QrCodeController;
use App\Http\Controllers\Guide\MerchantController;
use App\Http\Controllers\Guide\Auth\LoginController;
use App\Http\Controllers\Guide\Auth\RegisterController;
use App\Http\Controllers\Guide\ProfileController;

Route::prefix("guide")
    ->as("guide.")
    ->group(function() {
        Route::get("/login", [LoginController::class, 'index'])->name("login");
        Route::get("/register", [RegisterController::class, 'index'])->name("register");

        Route::get("/", [HomeController::class, 'index'])->name("home");

        Route::controller(MerchantController::class)
        ->prefix("merchants")
        ->name("merchants.")
        ->group(function () {
            Route::get('/', 'index')->name("index");
            Route::get('/detail/{id}', 'detail')->name("detail");
            Route::get('/category/{category}', 'category')->name("category");
        });

        Route::controller(QrCodeController::class)
        ->prefix("qrcode")
        ->name("qrcode.")
        ->group(function () {
            Route::get('/', 'index')->name("index");
            Route::get('/histories', 'histories')->name("histories");
        });

        Route::controller(InboxController::class)
        ->prefix("inbox")
        ->name("inbox.")
        ->group(function () {
            Route::get('/merchant', 'merchant')->name("merchant");
            Route::get('/admin', 'admin')->name("admin");
        });

        Route::controller(ProfileController::class)
        ->prefix("profile")
        ->name("profile.")
        ->group(function () {
            Route::get('/', 'index')->name("index");
        });
    });