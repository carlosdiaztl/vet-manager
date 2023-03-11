<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
route::resource('pets', App\Http\Controllers\PetController::class)->names('pets');
route::resource('books', App\Http\Controllers\BookController::class)->names('books')->except('show');
route::get('/books/mostrar', [App\Http\Controllers\BookController::class, 'show']);
route::resource('vet', App\Http\Controllers\VetController::class)->names('vet')->except('show');
