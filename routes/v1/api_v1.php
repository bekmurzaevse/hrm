<?php

use App\Http\Controllers\v1\ClientController;
use Illuminate\Support\Facades\Route;

Route::pattern('id', '\d+');
Route::pattern('hash', '[a-z0-9]+');
Route::pattern('hex', '[a-f0-9]+');
Route::pattern('uuid', '[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}');
Route::pattern('base', '[a-zA-Z0-9]+');
Route::pattern('slug', '[a-z0-9-]+');
Route::pattern('username', '[a-z0-9_-]{3,16}');


Route::get('/', function () {
    return "API v1";
});

Route::prefix('clients')->group(function () {
    Route::get('/', [ClientController::class, 'index']);
    Route::get('/{id}', [ClientController::class, 'show']);
    Route::post('/create', [ClientController::class, 'create']);
    Route::put('/update/{id}', [ClientController::class, 'update']);
    Route::delete('/delete/{id}', [ClientController::class, 'delete']);
});
