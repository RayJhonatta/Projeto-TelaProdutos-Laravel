<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonController;

Route::get('/listar', [PersonController::class, 'index']);

Route::post('/nova', [PersonController::class, 'store']);

Route::put('/editar/{id}', [PersonController::class, 'update']);

Route::delete('/deletar/{id}', [PersonController::class, 'destroy']);