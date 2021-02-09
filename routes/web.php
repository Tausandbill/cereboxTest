<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/clients/create', [App\Http\Controllers\ClientController::class, 'create']);
Route::get('/clients/show/{client}', [App\Http\Controllers\ClientController::class, 'show']);
Route::get('/clients/{client}/edit', [App\Http\Controllers\ClientController::class, 'edit']);
Route::patch('/clients/{client}', [App\Http\Controllers\ClientController::class, 'update']);
Route::delete('/clients/delete/{client}', [App\Http\Controllers\ClientController::class, 'destroy']);
Route::post('/clients', [App\Http\Controllers\ClientController::class, 'store']);

Route::get('/clients/{client}/services/create', [App\Http\Controllers\ServiceController::class, 'create']);
Route::post('/clients/{client}/services', [App\Http\Controllers\ServiceController::class, 'store']);
