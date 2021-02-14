<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;

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
Route::get(
    '/kategori',
     [KategoriController::class, 'index']
     )->name('kategori');

Route::post(
    '/kategori/store',
     [KategoriController::class, 'store']
     )->name('store_kategori');

Route::get(
    '/kategori/edit/{id}',
     [KategoriController::class, 'edit']
     )->name('edit_kategori');

Route::get(
    '/kategori/destroy/{id}',
     [KategoriController::class, 'destroy']
     )->name('destroy_kategori');
