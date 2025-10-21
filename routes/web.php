<?php

use App\Http\Controllers\LampController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/catalog', function () {
    return view('catalog');
});

Route::resource('lamps', LampController::class);