<?php

use App\Http\Controllers\API\PostAPIController;
use App\Http\Controllers\API\WebsiteAPIController;
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

Route::get('websites', [WebsiteAPIController::class, 'index']);
Route::post('{website:title}/subscribe', [WebsiteAPIController::class, 'subscribeUser']);
Route::post('{website:title}/post', [PostAPIController::class, 'store']);
