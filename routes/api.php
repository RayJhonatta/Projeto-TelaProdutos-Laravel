<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/person', [App\Http\Controllers\PersonController::class, 'index']);

Route::post('/person', [App\Http\Controllers\PersonController::class, 'store']);

Route::get('/person/{id}', [App\Http\Controllers\PersonController::class, 'show']);

Route::put('/person/{id}', [App\Http\Controllers\PersonController::class, 'update']);

Route::delete('/person/{id}', [App\Http\Controllers\PersonController::class, 'destroy']);