<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/ping', function () {
    try {
        DB::select('SELECT 1');
        return response()->json([
            'status' => 'ok',
            'database' => 'connected',
            'timestamp' => now()->toDateTimeString()
        ], 200);
    } catch (\Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => 'Database connection failed'
        ], 500);
    }
});

Route::post('/login', [App\Http\Controllers\PersonController::class, 'login']);

Route::get('/person', [App\Http\Controllers\PersonController::class, 'index']);

Route::post('/person', [App\Http\Controllers\PersonController::class, 'store']);

Route::get('/person/{id}', [App\Http\Controllers\PersonController::class, 'show']);

Route::put('/person/{id}', [App\Http\Controllers\PersonController::class, 'update']);

Route::delete('/person/{id}', [App\Http\Controllers\PersonController::class, 'destroy']);