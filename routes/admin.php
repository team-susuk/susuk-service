<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Order\AdminOrderMerchantController;
use App\Http\Controllers\Admin\Regions\AdminSubdistrictsController;

Route::controller(AdminSubdistrictsController::class)
     ->as('regions.')
     ->prefix('region')
     ->group(function () {
          Route::get('city/{province_id}', 'city')->name('city');
          Route::get('sub-district/{city_id}', 'subDistrict')->name('sub-district');
     });

Route::controller(AdminOrderMerchantController::class)
     ->as('order-merchant.')
     ->prefix('order-merchant')
     ->group(function () {
          Route::post('/update/status/{uuid}/{status}', 'updateStatus')->name('update-status');
     });