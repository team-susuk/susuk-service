<?php

use App\Http\Controllers\Guide\Auth\LoginController;
use App\Http\Controllers\Guide\Auth\RegisterController;
use App\Http\Controllers\Guide\HomeController;
use App\Http\Controllers\Guide\MerchantController;
use App\Http\Controllers\Guide\QrCodeController;
use Illuminate\Support\Facades\Route;

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
        });

        Route::controller(QrCodeController::class)
        ->prefix("qrcode")
        ->name("qrcode.")
        ->group(function () {
            Route::get('/', 'index')->name("index");
            Route::get('/histories', 'histories')->name("histories");
        });
    });