<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\toDoController;

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

Route::get('/', [toDoController::class,'index']);



Route::post('/done', [toDoController::class,'store']);

Route::delete('/del/{id}', [toDoController::class,'destroy']);

Route::delete('/display/{id}', [toDoController::class,'edit']);

Route::put('/up/{id}', [toDoController::class,'update']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
