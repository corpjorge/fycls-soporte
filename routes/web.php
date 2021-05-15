<?php

use App\Http\Controllers\DeviceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkplaceController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {  return view('welcome'); });

Route::get('/workplaces', [WorkplaceController::class, 'workplaceList']);
Route::get('/workplace/{id}', [WorkplaceController::class, 'workplace']);
Route::get('/products', [WorkplaceController::class, 'productsWorkplace']);
Route::get('/user/{id}', [UserController::class, 'user']);
Route::put('/user/{user}', [UserController::class, 'update']);


Route::get('workplace/{id}/devices', [DeviceController::class, 'DevicesWorkplace']);
Route::get('workplace/{id}/products', [ProductController::class, 'productsWorkplace']);
Route::get('workplace/{id}/users', [UserController::class, 'usersWorkplace']);

Route::get('workplace/{id}/devices/total', [DeviceController::class, 'devicesWorkplaceTotal']);
Route::get('workplace/{id}/products/total', [ProductController::class, 'productsWorkplaceTotal']);
Route::get('workplace/{id}/users/total', [UserController::class, 'usersWorkplaceTotal']);


Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', function () {
        return view('home');
    })->middleware(['verified']);
});
