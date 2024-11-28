<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CocheController;

Route::resource('coches', CocheController::class);

Route::get('/', function () {
    return view('welcome');
});
