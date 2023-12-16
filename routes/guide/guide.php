<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Guide\HomeController;
use App\Http\Controllers\Guide\InboxController;
use App\Http\Controllers\Guide\QrCodeController;
use App\Http\Controllers\Guide\MerchantController;
use App\Http\Controllers\Guide\Auth\LoginController;
use App\Http\Controllers\Guide\Auth\RegisterController;
use App\Http\Controllers\Guide\ProductController;
use App\Http\Controllers\Guide\ProfileController;
use App\Http\Controllers\Utils\FeedbackController;

Route::prefix("guide")
    ->as("guide.")
    ->group(function() {
        Route::middleware("role-guest:guide")->group(function() {
            Route::get("/login", [LoginController::class, 'index'])->name("login");
            Route::post("/login", [LoginController::class, 'store'])->name("login.store");
            Route::get("/register", [RegisterController::class, 'index'])->name("register");
            Route::post("/register", [RegisterController::class, 'store'])->name("register.store");
        });

        Route::middleware(["role-auth:guide", "check-member-guide"])->group(function() {
            Route::get("/", [HomeController::class, 'index'])->name("home");
            Route::get("/search/{search}", [HomeController::class, 'search'])->name("home.search");
            Route::post("/logout", [LoginController::class, 'logout'])->name("logout");

            Route::controller(HomeController::class)
            ->prefix("home")
            ->name("home.")
            ->group(function () {
                Route::get("/merchant-categories/{category}", 'merchantCategories')->name("merchant-categories");
            });
    
            Route::controller(MerchantController::class)
            ->prefix("merchants")
            ->name("merchants.")
            ->group(function () {
                Route::get('/', 'index')->name("index");
                Route::get('/index-data', 'indexData')->name("index-data");
                Route::get('/detail/{id}', 'detail')->name("detail");
                Route::post('/detail/{id}/booking', 'booking')->name("booking");
                Route::get('/category/{category}', 'category')->name("category");
                Route::get('/featured/{featured}', 'featured')->name("featured");

                Route::get('/category-data/{type}/{category}', 'categoryData')->name("category-data");
            });
    
            Route::controller(ProductController::class)
            ->prefix("products")
            ->name("products.")
            ->group(function () {
                Route::get('/category/{category}', 'category')->name("category");
                Route::get('/category/{category}', 'category')->name("category");
                Route::get('/category-data/{category}', 'categoryData')->name("category-data");
            });
    
            Route::controller(QrCodeController::class)
            ->prefix("qrcode")
            ->name("qrcode.")
            ->group(function () {
                Route::get('/', 'index')->name("index");
                Route::get('/histories', 'histories')->name("histories");
                Route::get('/histories-data', 'historiesData')->name("histories-data");
            });
    
            Route::controller(InboxController::class)
            ->prefix("inbox")
            ->name("inbox.")
            ->group(function () {
                Route::get('/merchant', 'merchant')->name("merchant");
                Route::get('/admin', 'admin')->name("admin");

                Route::get('/merchant-data', 'merchantData')->name("merchant-data");
                Route::get('/admin-data', 'adminData')->name("admin-data");
            });
    
            Route::controller(ProfileController::class)
            ->prefix("profile")
            ->name("profile.")
            ->group(function () {
                Route::get('/', 'index')->name("index");
                Route::get('/detail', 'detail')->name("detail");
                Route::get('/edit', 'edit')->name("edit");

                Route::post('/edit', 'editPost')->name("edit");
                Route::post('/change-password', 'changePassword')->name("change-password");
            });

            Route::controller(FeedbackController::class)
            ->prefix("feedback")
            ->name("feedback.")
            ->group(function () {
                Route::post('/complaint', 'complaint')->name("complaint");
            });
        });

    });