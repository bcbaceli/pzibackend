<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\ApartmentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RoomController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'getUser']);
    Route::get('/users',[AuthController::class,'getUsers']);

    Route::apiResource('addresses', AddressController::class);
    Route::apiResource('rooms', RoomController::class);
    Route::apiResource('apartments', ApartmentController::class);
    Route::apiResource('guests', GuestController::class);
    Route::apiResource('owners', OwnerController::class);
    Route::apiResource('reservations', ReservationController::class);
});
