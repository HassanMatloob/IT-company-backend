<?php

use App\Http\Controllers\ApiController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('get_all_settings', [ApiController::class, 'get_all_settings'])->name('get_all_settings');
Route::get('get_settings_by_id/{id}', [ApiController::class, 'get_settings_by_id'])->name('get_settings_by_id');
Route::get('get_settings_by_name/{name}', [ApiController::class, 'get_settings_by_name'])->name('get_settings_by_name');
Route::get('get_portfolios_by_id/{id}', [ApiController::class, 'get_portfolios_by_id'])->name('get_portfolios_by_id');
Route::get('get_careers_by_id/{id}', [ApiController::class, 'get_careers_by_id'])->name('get_careers_by_id');
Route::post('message', [ApiController::class, 'storeMessage'])->name('message');
