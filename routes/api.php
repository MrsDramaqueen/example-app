<?php

use App\Http\Controllers\BakerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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

//Route::post('/baker', [BakerController::class, 'store']);
//Route::get('/index', [BakerController::class, 'index']);
//Route::get('/baker/{id}', [BakerController::class, 'show']);

Route::group(['prefix' => 'baker'], function () {
    Route::get('/', [BakerController::class, 'index']);
    Route::get('/{id}', [BakerController::class, 'show']);
    Route::delete('/{id}', [BakerController::class, 'destroy']);
    Route::post('/', [BakerController::class, 'store']);
    Route::put('/{id}', [BakerController::class, 'update']);
});






