<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\CsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


// Master Kategori
Route::resource('kategori', KategoriController::class)->names([
    'index'   => 'kategori'
]);

// Master Tags
Route::resource('tag', TagController::class)->names([
    'index' => 'tag'
]);

// Master Customer Services
Route::resource('cs', CsController::class)->names([
    'index' => 'cs'
]);

Route::get('/cs-add',function(){
    return view('master.cs_add');
});
