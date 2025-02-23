<?php

use App\Http\Controllers\DemandaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::resource('demandas', DemandaController::class)->only(['index', 'show', 'store', 'update', 'destroy']);
