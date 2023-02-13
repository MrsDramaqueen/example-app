<?php

use App\Http\Controllers\Baker\BakerController;
use App\Http\Controllers\Bun\BunController;
use App\Http\Controllers\Client\ClientController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'baker'], function () {
    Route::get('/', [BakerController::class, 'index']);
    Route::get('/{id}', [BakerController::class, 'show']);
    Route::delete('/{id}', [BakerController::class, 'destroy']);
    Route::post('/', [BakerController::class, 'store']);
    Route::put('/{id}', [BakerController::class, 'update']);
});

Route::group(['prefix' => 'client'], function () {
    Route::get('/', [ClientController::class, 'index']);
    Route::put('/{id}', [ClientController::class, 'update']);
});

Route::group(['prefix' => 'bun'], function () {
   Route::get('/', [BunController::class, 'index']);
});






