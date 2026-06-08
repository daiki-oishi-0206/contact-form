<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;

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

Route::get('/', [ContactController::class, 'index']);
Route::post('/confirm', [ContactController::class, 'confirm']);
Route::post('/store', [ContactController::class, 'store']);
Route::post('/back', [ContactController::class, 'back']);
Route::get('/thanks', [ContactController::class, 'thanks']);

Route::get('/register', [RegisterController::class, 'create']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'create']);
Route::post('/login', [LoginController::class, 'store']);


Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/contacts', [AdminController::class, 'index']);
    Route::get('/contacts/export', [AdminController::class, 'export']);
    Route::get('/contacts/{id}', [AdminController::class, 'show']);
    Route::delete('/contacts/{id}', [AdminController::class, 'destroy']);
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

