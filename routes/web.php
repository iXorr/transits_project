<?php

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\Route;

use App\Models\Shipping;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('main', [
        "shippings" => Shipping::all()
    ]);
});

Route::get('auth', [AuthController::class, 'index'])
    ->name("login")
    ->middleware('guest');

Route::post('login', [AuthController::class, 'tryLogin']);
Route::post('register', [AuthController::class, 'tryRegister'])
    ->withoutMiddleware([VerifyCsrfToken::class]);

Route::get('logout', [AuthController::class, 'logout'])
    ->middleware('auth');

Route::controller(DashboardController::class)
    ->middleware('auth')
    ->prefix('dashboard')
    ->group(function() {
        Route::get('', 'index');
        Route::get('my-shippings', 'getUserShippings');
        Route::get('check-shippings', 'getActiveShippings');

        Route::get('create-shipping', 'getFormCreateShipping');
        Route::post('create-shipping', 'createShipping');

        Route::get('delete-shipping/{shipping_id}', 'deleteShipping');
        Route::get('change-shipping/{shipping_id}', 'getFormEditShipping');
        Route::post('change-shipping/{shipping_id}', 'editShipping');
        
        Route::get('create-vehicle', 'getFormCreateVehicle');
        Route::post('create-vehicle', 'createVehicle');
        Route::get('my-vehicles', 'getUserVehicles');
        Route::get('delete-vehicle/{vehicle_id}', 'deleteVehicle');

        Route::get('reg-shipping/{shipping_id}', 'getFormRegShipping');
        Route::post('reg-shipping/{shipping_id}', 'regShipping');
    });