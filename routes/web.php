<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActorController;
use App\Http\Controllers\MovieController;

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

Route::group(['prefix' => 'actors'], function(){
    Route::get('', [ActorController::class, 'index'])->name('actor.index');
    Route::get('create', [ActorController::class, 'create'])->name('actor.create');
    Route::post('store', [ActorController::class, 'store'])->name('actor.store');
    Route::get('edit/{actor}', [ActorController::class, 'edit'])->name('actor.edit');
    Route::post('update/{actor}', [ActorController::class, 'update'])->name('actor.update');
    Route::post('delete/{actor}', [ActorController::class, 'destroy'])->name('actor.destroy');
    Route::get('show/{actor}', [ActorController::class, 'show'])->name('actor.show');
 });
 
 Route::group(['prefix' => 'movie'], function(){
    Route::get('', [MovieController::class, 'index'])->name('movie.index');
    Route::get('create', [MovieController::class, 'create'])->name('movie.create');
    Route::post('store', [MovieController::class, 'store'])->name('movie.store');
    Route::get('edit/{movie}', [MovieController::class, 'edit'])->name('movie.edit');
    Route::post('update/{movie}', [MovieController::class, 'update'])->name('movie.update');
    Route::post('delete/{movie}', [MovieController::class, 'destroy'])->name('movie.destroy');
    Route::get('show/{movie}', [MovieController::class, 'show'])->name('movie.show');
 });
  
 