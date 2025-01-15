<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\MovementController;
use App\Http\Controllers\Api\GoogleMapController;
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

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('logout', [AuthController::class, 'logout']);

Route::middleware('auth:sanctum')->get('/movements-for-map', [GoogleMapController::class, 'getMovementsForMap']);



Route::middleware('auth:api')->group(function () {
    Route::get('movements', [MovementController::class, 'index']);
    Route::post('movements', [MovementController::class, 'store']);
    Route::get('movements/{id}', [MovementController::class, 'show']);
    Route::put('movements/{id}', [MovementController::class, 'update']);
    Route::delete('movements/{id}', [MovementController::class, 'destroy']);
});