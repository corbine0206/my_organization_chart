<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PositionController;
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


Route::get('positions', [PositionController::class, 'index']);
Route::post('positions', [PositionController::class, 'store']);
Route::get('positions/{position}', [PositionController::class, 'show']);
Route::put('positions/{position}', [PositionController::class, 'update']);
Route::delete('positions/{position}', [PositionController::class, 'destroy']);
