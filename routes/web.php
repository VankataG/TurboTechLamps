<?php

use App\Http\Controllers\LampController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::resource('lamps', LampController::class);