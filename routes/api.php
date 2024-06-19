<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogsController;

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

Route::prefix('log')->middleware('auth.token')->group(function () {
    // rest-like routes
    Route::get('/', [LogsController::class, 'list'])->name('list');
    Route::post('/', [LogsController::class, 'add'])->name('add');
});
