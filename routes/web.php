<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PenyakitController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
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

// Route::get('/login','LoginController@index');
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticated']);
Route::resource('/admin/penyakit', PenyakitController::class);