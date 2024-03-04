<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

use App\Http\Controllers\Api;

// Sensors
Route::get('/sensors/{param}', [Api\SensorsController::class, 'getValue']);

// Config
Route::get('/sensors/config/{param}', [Api\Sensors\ConfigController::class, 'show']);
Route::post('/sensors/config/{param}', [Api\Sensors\ConfigController::class, 'store']);

// Logs
Route::get('/sensors/logs/{param}', [Api\Sensors\LogsController::class, 'index']);
Route::get('/sensors/logs/{param}/{id}', [Api\Sensors\LogsController::class, 'show']);
Route::delete('/sensors/logs/{param}', [Api\Sensors\LogsController::class, 'deleteAll']);

//
// Test source
Route::get('/r/{param}', [Api\ResourceController::class, 'getValue'])->name('test');