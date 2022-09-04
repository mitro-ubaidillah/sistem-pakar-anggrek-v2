<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CasesController;
use App\Http\Controllers\SymptomController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DiseaseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CfUserController;
use App\Http\Controllers\DiagnosaController;
use App\Models\Disease;

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
    $title = "Beranda";
    $penyakit = Disease::oldest()->simplePaginate(5);
    return view('home', compact('title', 'penyakit'));
});

Route::get('/diagnosa', [DiagnosaController::class, 'index']);
Route::post('/diagnosa/result', [DiagnosaController::class, 'diagnose'])->name('result');
Route::post('/diagnosa/result/store', [DiagnosaController::class, 'store'])->name('diagnosa.store');

// Route::get('/login','LoginController@index');
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticated']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/admin/dashboard', [AdminController::class, 'index'])->middleware('auth');
Route::resource('/admin/disease', DiseaseController::class)->middleware('auth');
Route::resource('/admin/symptom', SymptomController::class)->middleware('auth');
// Route::resource('/admin/cfUser', CfUserController::class)->middleware('auth');

Route::resource('/admin/cases', CasesController::class)->middleware('auth');
Route::get('/admin/cases/create/{id}', [CasesController::class,])->middleware('auth');