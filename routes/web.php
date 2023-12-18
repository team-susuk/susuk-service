<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Utils\PriceConfigController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name("welcome");

Route::get('/utils/subscription/{type}', [PriceConfigController::class, 'subscription'])->name("utils.subscription");

require __DIR__.'/guide/guide.php';
require __DIR__.'/merchant/merchant.php';
