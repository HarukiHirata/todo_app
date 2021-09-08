<?php

use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
=======
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;

>>>>>>> origin/develop

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
<<<<<<< HEAD
=======

Auth::routes();

Route::get('/home', [TaskController::class, 'index'])->name('home');
Route::post('/store', [TaskController::class, 'store'])->name('store');
Route::get('/edit/{id}', [TaskController::class, 'edit'])->name('edit');
Route::post('/update', [TaskController::class, 'update'])->name('update');
Route::post('/destroy', [TaskController::class, 'destroy'])->name('destroy');
>>>>>>> origin/develop
