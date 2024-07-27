<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;

Route::get('/', function () {
    return view('registro');
});

Route::apiResource('register', RegisterController::class)->only('store');
