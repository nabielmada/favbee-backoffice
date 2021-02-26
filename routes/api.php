<?php

namespace App\Http\Controllers;

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

Route::middleware('auth:sanctum')->group(function(){
});

Route::get('/webmenu', [ApiController::class, 'webmenu']);
Route::put('/webmenu', [ApiController::class, 'webmenu_edit']);

Route::get('/product', [ApiController::class, 'product']);
Route::get('/product/{id}', [ApiController::class, 'product_detail']);
