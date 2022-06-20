<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GejalaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PenyakitController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CfUserController;
use App\Http\Controllers\DiagnosaController;
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
    return view('home', [
        "title" => "Home"
    ]);
});

Route::get('/diagnosa', [DiagnosaController::class, 'index']);
Route::post('/diagnose', [DiagnosaController::class, 'diagnose'])->name('diagnose');

// Route::get('/login','LoginController@index');
Route::get('/register', [RegisterController::class, 'index'])->name('login')->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticated']);

Route::get('/admin/dashboard', [AdminController::class, 'index'])->middleware('auth');
Route::resource('/admin/penyakit', PenyakitController::class)->middleware('auth');
Route::resource('/admin/gejala', GejalaController::class)->middleware('auth');
Route::resource('/admin/cfUser', CfUserController::class)->middleware('auth');