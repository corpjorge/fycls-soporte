<?php

use App\Http\Controllers\WorkplaceController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {  return view('welcome'); });

Route::get('/workplaces', [WorkplaceController::class, 'workplaceList']);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', function () {
        return view('home');
    })->middleware(['verified']);
});
