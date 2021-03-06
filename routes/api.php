<?php

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

//Route::get('api/v1/jsonResponse', "ProductAuditController@jsonResponse");

Route::get('audits', [\App\Http\Controllers\AuditController::class, 'index']);

Route::get('audits/{id}', [\App\Http\Controllers\AuditController::class, 'show']);

Route::get('/v1/jsonResponse', [\App\Http\Controllers\ProductAuditController::class, 'jsonResponse']);
