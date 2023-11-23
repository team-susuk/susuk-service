<?php

use App\Http\Controllers\Guide\Auth\LoginController;
use App\Http\Controllers\Guide\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::prefix("guide")
    ->as("guide.")
    ->group(function() {
        Route::get("/login", [LoginController::class, 'index'])->name("login");
        Route::get("/register", [RegisterController::class, 'index'])->name("register");
    });